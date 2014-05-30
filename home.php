<body>
  <div class="loader"></div>

  <section id="home">
    <div class="row fixed" id="user">
      <div class="columns">
    <!-- Navigation -->

    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <!-- Title Area -->

        <li class="name">
          <h1><a href="#"></a></h1>
        </li>

        <li class="toggle-topbar menu-icon">
          <a href="#"><span id="username"><?php echo '' . $_SESSION['user_name'] . ''; ?></span></a>
        </li>
      </ul>

      <section class="top-bar-section">
        <ul class="left" data-dropdown-content>
          <li class="dropLi">
            <a href="#home">Home</a>
          </li>
          <li class="dropLi">
            <a href="#goals">Goals</a>
          </li>
	  <li class="dropLi">
            <a href="#today">Rate</a>
          </li>
	  <li class="dropLi">
            <a href="#metrics">Metrics</a>
          </li>
        </ul>

        <ul class="right has-dropdown" data-dropdown-content>
          <li class="dropLi">
              <a href="signout.php">Sign-Out <?php echo '<span>' . $_SESSION['user_name'] . '</span>'; ?></a>
          </li>
        </ul>
      </section>
    </nav><!-- End Navigation -->
    </div>
  </div>
  <div id="welcomeWrap" class="zoom zoomHome">
     <div id="welcomeLogo">Get Started</div>
     <div id="welcomeUser">Bettering ourselves one day at a time.</div>
  </div>
  </section>
