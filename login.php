<?php session_start();?>
<?php include "includes/alerts.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>First Fountain Homes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">
	      	<img src="images/logo.png">
	      </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"><i class="fa fa-2x fa-bars" aria-hidden="true"></i></span> 
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">HOME</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">ABOUT</a></li>
	          <li class="nav-item"><a href="project.php" class="nav-link">PROJECT</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">CONTACT</a></li>
	        </ul>
	         <a href="signup.php" type="button" class="btn btn-success">SIGN UP</a>

	      </div>
	    </div>
	  </nav>
  <!-- END nav -->

  <!-- form -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- form starts -->
        <form class="form-container" action="process/processlogin.php" method="post">
         <?php error_alert();success_alert();?>
          <h2 class="text-center">Account Login</h2>
          <div class="form-group">
            <label for="exampleInputEmail1"></label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"></label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Submit">
        </form>
        <p>Dont't have an account? <a href="signup.php">Sign Up</a></p>
        <a href="forgotpass.php" class="password-action">Forgot Password?</a>
        <!-- form ends -->
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
    </div>
  </div>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#721922" />
    </svg></div>
  
  
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  
  </body>
  
  </html>