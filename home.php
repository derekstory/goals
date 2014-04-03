<body>
<?php
       if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
        {}else
        {
        header("Location: signin.php");
	exit;
        }
?>
  <section id="home">
      <div id="user" class="zoom">
	<a class="left" href="#home">Home</a>
	<a class="left" href="#goals">Goals</a>
	<a class="left" href="#today">Rate</a>
	<a class="left" href="#metrics">Metrics</a>
	<a id="signOut" href="signout.php">Sign Out Username</a>
	
      </div>
      <div id="welcomeWrap" class="zoom zoomHome">
	<div id="welcomeLogo">Get Started</div>
	<div id="welcomeUser">Bettering ourselves one day at a time.</div>
      </div>
  </section>
