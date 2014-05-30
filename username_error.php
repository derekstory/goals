<?php
ob_start();
include 'connect.php';
?>

<!doctype html>
<html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Self Improvement.">
    <title>Goal Site</title>
    <script src="foundation/js/vendor/modernizr.js"></script>
    <link rel="stylesheet" href="foundation/css/foundation2.css" />
    <link rel="stylesheet" type="text/css" href="Style/reset.css">
    <link rel="stylesheet" type="text/css" href="Style/signin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Gruppo' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Simonetta' rel='stylesheet' type='text/css'>
</head>

<script>
$(document).ready(function(){
$('body').fadeIn(1000);
});
</script>

<body>

 <section id="signinHome">
        <div class="row" id="user">
          <div class="columns">
            <nav class="top-bar" data-topbar>
                <ul class="title-area">
                    <li class="name">
                         <h1><a href="#"></a></h1>
                    </li>
                    <li class="toggle-topbar menu-icon"> <a href="#">menu</a>

                    </li>
                </ul>
                <section class="top-bar-section">
                    <ul data-dropdown-content>
                        <li class="dropLi">	
			     <a href="#signupTopWrap">Sign-In</a>
                        </li>
                        <li class="dropLi">	
			     <a href="#signupWrap">Sign-Up</a>
                        </li>
                        <li class="dropLi">	
			     <a href="#about">Learn More</a>
                        </li>
                    </ul>
                </section>
            </nav>
          </div>
       </div>
      <div id="welcomeWrap" class="zoom zoomHome">
        <div id="welcomeLogo">Get Started</div>
        <div id="welcomeUser">Bettering ourselves one day at a time.</div>
      </div>
    </section>

<?php
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
	 header("Location: index.php");
}
else
{
        if($_SERVER['REQUEST_METHOD'] != 'POST')
        {

echo '<div id="signupTopWrap" class="large-12 row">
       <div class="large-2 columns logo">
          <img class="logo" src="http://mattherbertdesign.com/logo_placeholder.png" height="10px" width="200px">
       </div>
       <div class="columns large-6 columns">
         <h1 id="signin">Sign In</h1>
	<form method="post" action=""> 
          <div class="columns topInput large-4">
            <input type="text" id="signinTextUsername" placeholder="Username" name="user_name">
          </div>
          <div class="large-4 columns topInput">
            <input type="password" id="signinTextPassword" placeholder="Password" class="large-2 columns" name="user_password">
          </div>
	  <input name="action" type="hidden" value="login" />
          <div class="large-4 columns topInput">
            <input type="submit" id="signinSubmit" class="submit" value="Sign-In" class="large-2 columns">
          </div>
	</form>
       </div>
      </div>';
      } 
      else
      {
      $errors = array();

                if(empty($_POST['user_name']))
                {
                        $errors[] =  header('location:signin_error.php#signin');
                }
                if(empty($_POST['user_password']))
                {
                        $errors[] =  header('location:signin_error.php#signin');
                }
                if(!empty($errors))
                {
                        $errors[] =  header('location:signin_error.php#signin');
                }
                elseif($_POST['action']=="login")
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
                                                user_pass = '" . sha1($_POST['user_password']) . "'";

                        $result = mysql_query($sql);
                        if(!$result)
                        {
                                echo 'Something went wrong while signing in. Please try again later.';
                        }
                        else
                        {
                                if(mysql_num_rows($result) == 0)
                                {
                        	$errors[] =  header('location:signin_error.php#signin');	
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


<?php
$user_name = $_POST["user_name"];
$q = mysql_query("SELECT user_name FROM users WHERE user_name = '$user_name'");

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
  echo'<div id="signinBodyWrap">
      <div id="signinTitle"></div>
      <div class="row columns large-5" id="signupWrap">
         <h1 class="usernameError">Username already exist.</h1>
         <h4 class="usernameTryAgain">Please try again.</h4>

        <form method="post" action="" data-abide>
            <div>
                <input type="text" required pattern="username" id="signupTextUsername" placeholder="Username" name="user_name"> 
		<small class="error">Must be between 6 and 50 characters.</small>
            </div>
            <div>
                <input type="password" required pattern="password" id="signupTextPassword" placeholder="Password" name="user_pass"> 
		<small class="error">Must have one capital letter, one number & be at least 8 characters long.</small>
            </div>
            <div>
                <input type="password" required pattern="[a-zA-Z]+" data-equalto="signupTextPassword" id="signupTextPasswordConfirm" placeholder="Confirm Password" name="user_pass_check"> 
		<small class="error">Password does not match.</small>
            </div>
            <div id="terms">
                <h5><a href="termsandconditions.php">Terms and Conditions</a></h5>
            </div>
	  <input name="action" type="hidden" value="signup" />
            <input type="submit" id="signupSubmit" class="submit" value="Sign-Up">
        </form>
    </div>';
}
elseif($_POST['action']=="signup")
{
        $error = array();
       
        if(mysql_num_rows($q) != 0)
        {
        $error[] =  header('location:username_error.php#signupWrap');	                        
        }
        else

        {
                $sql = "INSERT INTO
                        users(                                   user_name, 
                                                                 user_pass, 
                                                                 user_date, 
                                                                user_level)
                        VALUES(            '" . ($_POST['user_name']) . "',
                                           '" . sha1($_POST['user_pass']) . "', 
                                                                     NOW(),
                                                                       0)";
                $result = mysql_query($sql);
                if(!$result)
                {
                $error[] =  header('location:test2.php');	                        
                }
                else
                {
                $result = mysql_query($sql);
                $sql2 = "SELECT	
                                                user_id,
                                                user_name,
                                                user_level
                                        FROM
                                                users
                                        WHERE
                                                user_name = '" . mysql_real_escape_string($_POST['user_name']) . "'
                                        AND
                                                user_pass = '" . sha1($_POST['user_pass']) . "'";

                        $result2 = mysql_query($sql2);
                        if(!$result2)
                        {
                                echo 'Something went wrong while signing in. Please try again later.';
                        }
                        else
                        {
                                if(mysql_num_rows($result2) == 0)
                                {
                        	$errors[] =  header('location:signin_error.php');	
                                }
                                else
                                {
                                        $_SESSION['signed_in'] = true;

                                        while($row2 = mysql_fetch_assoc($result2))
                                        {
                                                $_SESSION['user_id']         = $row2['user_id'];
                                                $_SESSION['user_name']         = $row2['user_name'];
                                                $_SESSION['user_level'] = $row2['user_level'];
                                        }
                                        header('location:index.php');
                                }
                        }
	       }
       }
}         
?>

    <div class="row columns large-6">
        <div id="signupPointsWrap">
            	<h2 class="signupPointsTitle">Looking to improve yourself?</h2>
            	<h2 class="signupPoints">Site Title is more than just a tool for tracking your goals. We provide metrics for helping you compare which goals have the most impact on your overall happiness. This allows users to focus on the goals that will lead to a better life. </h2>
        </div>
        <div id="learnMore">	
	     <a href="#about"><h2>Learn More</h2></a>
        </div>
    </div>
  </div>


<div class="row columns large-12" id="footer">
    <div id="aboutBodyWrap">
      <h1 id="about">About</h1>
      <div class="row">
	<div class="large-8 columns about">
	  <h1>Title insert here</h1>
	  <h2>Site Title is more than just a tool for tracking your goals. We provide metrics for helping you compare which goals have the most impact on your overall happiness. This allows users to focus on the goals that will lead to a better life</h2>
	</div>
	<div class="large-4 columns about right">
	  <h1 class="quote">"Quote of user describing nice feature here." - Username</h1>
	</div>
      </div>

      <div class="row">
	<div class="large-7 columns about right">
	  <h1>Title insert here</h1>
	  <h2>Site Title is more than just a tool for tracking your goals. We provide metrics for helping you compare which goals have the most impact on your overall happiness. This allows users to focus on the goals that will lead to a better life</h2>
	</div>
	<div class="large-5 columns about left">
	  <h1 class="quote">"Quote of user describing nice feature here." - Username</h1>
	</div>
      </div>

  <div class="row">
	<div class="large-7 columns about">
	  <h1>Title insert here</h1>
	  <h2>Site Title is more than just a tool for tracking your goals. We provide metrics for helping you compare which goals have the most impact on your overall happiness. This allows users to focus on the goals that will lead to a better life</h2>
	</div>
	<div class="large-5 columns about right">
	  <h1 class="quote">"Quote of user describing nice feature here." - Username</h1>
	</div>
      </div>

      <div class="row">
	<div class="large-8 columns about right">
	  <h1>Title insert here</h1>
	  <h2>Site Title is more than just a tool for tracking your goals. We provide metrics for helping you compare which goals have the most impact on your overall happiness. This allows users to focus on the goals that will lead to a better life</h2>
	</div>
	<div class="large-4 columns about left">
	  <h1 class="quote">"Quote of user describing nice feature here." - Username</h1>
	</div>
      </div>
    
    </div>
</div>
<script src="http://foundation.zurb.com/assets/js/templates/foundation.js"></script>
<script>
$(document).foundation();
var doc = document.documentElement;
doc.setAttribute('data-useragent', navigator.userAgent);

//Hide modal on click
$('.dropLi a').click(function () {
    $('.top-bar').removeClass('expanded');
});

</script>

<script>
//Form Validation Overide
Foundation.libs.abide.settings.patterns.password = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;

Foundation.libs.abide.settings.patterns.username = /^\w{6,50}$/;;

//Scroll to ID
$(function () {
    $('a[href*=#]:not([href=#])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 700);
                return false;
            }
        }
    });
});

//Font Size percent adjust in relation to window size
$(document).ready(function () {
    var $body = $('body');

    var setBodyScale = function () {
        var scaleSource = $body.width(),
            scaleFactor = 0.17,
            maxScale = 190,
            minScale = 10;

        var fontSize = scaleSource * scaleFactor;

        if (fontSize > maxScale) fontSize = maxScale;
        if (fontSize < minScale) fontSize = minScale;

        $('.zoom').css('font-size', fontSize + '%');
    }
    $(window).resize(function () {
        setBodyScale();
    });
    setBodyScale();
});
</script>

</body>
</html>

<?php
ob_end_flush();
?>
