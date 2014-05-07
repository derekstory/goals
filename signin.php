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
        <div id="signinTop">
	  <div id="signinTopWrap">
	    <form method="post" action="">
	      <input type="text" name="user_name" id="signinTextUsername" placeholder="Username" />
	      <input type="password" name="user_pass" id="signinTextPassword" placeholder="Password" />
	      <input type="submit" id="signinSubmit" value="Sign-In"/>
	    </form>
	  </div>
	</div>';
 }
        else
        {
                $errors = array();

                if(empty($_POST['user_name']))
                {
                        $errors[] = die('The username field must not be empty. Please <a href="signin.php" class="register" style="color: #5870D1">try again</a>.');
                }

                if(empty($_POST['user_pass']))
                {
                        $errors[] = die('The password field must not be empty. Please <a href="signin.php" class="register" style="color: #5870D1">try again</a>.');
                }
                if(!empty($errors))
                {
                        $die;
                        echo 'Uh-oh.. a couple of fields are not filled in correctly. Please <a href="signin.php" class="register" style="color: #5870D1">try again</a>.<br /><br />';
                        echo '<ul>';
                        foreach($errors as $key => $value)
                        {
                                echo '<li>' . $value . '</li>';
                        }
                        echo '</ul>';
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
                                        echo 'You have supplied a wrong user/password combination.  Please <a href="signin.php" class="register" style="color: #5870D1">try again</a>.<br /><br />';
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

<?php
ob_end_flush();
?>
