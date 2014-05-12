<?php
ob_start();
include 'connect.php';
include 'head.php';
?>

<script>
$(document).ready(function(){
$('body').fadeIn(800);
});
</script>

<body>

<?php
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
	 header("Location: index.php");
}
else
{
        if($_SERVER['REQUEST_METHOD'] != 'POST')
        {


echo '<section id="signinBackground"></section>
        <div id="signinTopError">
	  <div id="signinTopWrap">
	    <form method="post" action="">
	      <input type="text" name="user_name" id="signinTextUsernameError" placeholder="Username" />
	      <input type="password" name="user_pass" id="signinTextPasswordError" placeholder="Password" />
	      <input type="submit" id="signinSubmit" value="Sign-In"/>
	      <h3 id="signinError">Username/Password did not match</h3>
	    </form>
	  </div>
	</div>';
 }
        else
        {
                $errors = array();

                if(empty($_POST['user_name']))
                {
                        $errors[] =  header('location:signin_error.php');
                }
                if(empty($_POST['user_pass']))
                {
                        $errors[] =  header('location:signin_error.php');
                }
                if(!empty($errors))
                {
                        $errors[] =  header('location:signin_error.php');
                }
                else
                {
                        $sql = "SELECT
                                                user_id,
                                                user_name,
                                                user_level
                                        FROM
                                                users
                                        WHERE
                                                user_name = '" . mysql_real_escape_string($_POST['user_name']) . "'
                                        AND
                                                user_pass = '" . sha1($_POST['user_pass']) . "'";

                        $result = mysql_query($sql);
                        if(!$result)
                        {
                                echo 'Something went wrong while signing in. Please try again later.';
                        }
                        else
                        {
                                if(mysql_num_rows($result) == 0)
                                {
                        	$errors[] =  header('location:signin_error.php');	
                                }
                                else
                                {
                                        $_SESSION['signed_in'] = true;

                                        while($row = mysql_fetch_assoc($result))
                                        {
                                                $_SESSION['user_id']         = $row['user_id'];
                                                $_SESSION['user_name']         = $row['user_name'];
                                                $_SESSION['user_level'] = $row['user_level'];
                                        }
                                        header('location:index.php');
                                }
                        }
                }
        }

}
?>
<div id="signupWrap">
   <h1>Sign Up. Its free.</h1>
   <input type="text" id="signupTextUsername" placeholder="Username" />
    <input type="password" id="signupTextPassword" placeholder="Password" />
    <input type="password" id="signupTextPasswordConfirm" placeholder="Confirm Password" />
    <div id="terms"><h5><a href="goals.html">Terms and Conditions</a></h5></div>
    <input type="submit" id="signupSubmit" value="Sign-Up"/>
</div>

<div id="signupInfoSection">
</div>

</body>
</html>

<?php
ob_end_flush();
?>
