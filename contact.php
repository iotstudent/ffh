<?php session_start();?>
<?php include "includes/alerts.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>First Fountain Homes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/contact.css">
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
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('image/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-0 text-center">
          	<!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact <i class="fa fa-chevron-right"></i></span></p> -->
            <h1 class="mb-3 bread">Contact</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- contact form -->
    <div class="content">
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <div class="info">
            <div class="information">
              <i class="fas fa-envelope-open-text" aria-hidden="true"
                style="font-size: 24px; padding: 5px; color: #212246;"></i>
              <p>info@firstfountainhomes.com</p>
            </div>
            <div class="information">
              <i class="fas fa-flag" aria-hidden="true" style="font-size: 24px; padding: 5px; color: #212246;"></i>
              <p>
                +44 7404366473 (UK line)</p>
            </div>
            <div class="information">
              <i class="fa fa-phone-square" aria-hidden="true" style="font-size: 24px; padding: 5px; color: #212246;"></i>
              <p>
                08115777914, 08188270714</p>
            </div>
    
            <div class="information">
              <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 24px; padding: 5px; color: #212246;"></i>
              <p>IBADAN OFFICE: 43, 7up Road, Oluyole Estate, Off Ring Road, Ibadan</p>
            </div>
            <div class="information">
              <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 24px; padding: 5px; color: #212246;"></i>
              <p>LAGOS OFFICE: 6, Ajayi Aina Street, Gbagada Ifako, Opposite Deeper Life Church.</p>
            </div>
          </div>
    
          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="#">
                <i class="fa fa-twitter-square" aria-hidden="true"></i>
              </a>
              <a href="#">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="#">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
    
        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>
    
          <form action="process/processcontact.php" method="post">
            <h3 class="title">Contact us</h3>
            <h6 class="text-white text-center"><?php success_alert();error_alert();?></h6>
            <div class="input-container">
              <input type="email"class="input" name="senderemail" placeholder="Email">
            </div>
            <div class="input-container">
              <input type="tel" class="input" name="senderphone" placeholder="Phone">
            </div>
            <div class="input-container">
              <input type="text" name="subject" class="input" placeholder="Subject" >
            </div>
            <div class="input-container textarea">
              <textarea  class="input" name="sendermessage">Message</textarea>
            </div>
            <input type="submit" value="Send" class="butt"
              style="color: #fff; background-color: #901d28; border-radius: 4px; border: none; padding: 10px; width: 120px;" />
          </form>
        </div>
      </div>
    </div>
    
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.2795601051444!2d6.140331314857147!3d6.7357099951307156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1046950c83a7fa3f%3A0x12cbef30e51a643c!2sEsan%20West%20Local%20Government%20Secretariat!5e0!3m2!1sen!2sng!4v1601892451968!5m2!1sen!2sng"
      width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
    </iframe>

    <!-- footer -->
    <footer>
      <div class="container padding">
        <div class="row padding">
          <div class="col-md-4 col-sm-6">
            <img src="images/white.png" class="logo" alt="logo">
            <!-- <div class="col-12 social padding">
        		            <a href="#"><i class="fab fa-twitter"></i></a>
        		            <a href="#"><i class="fab fa-instagram"></i></a>
        		            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        		            <a href="#"><i class="fab fa-facebook"></i></a>
        		          </div> -->
          </div>
          <div class="col-md-8 col-sm-6 left">
            <div class="row padding ">
              <div class="col-md-4 left1">
                <h4>QUICK LINKS</h4>
                <a href="about.html" class="footer-link">
                  <p>ABOUT US</p>
                </a>
                <a href="proj.html" class="footer-link">
                  <p>PROJECTS</p>
                </a>
                <a href="#" class="footer-link">
                  <p>PROPERTIES</p>
                </a>
                <a href="contact.html" class="footer-link">
                  <p>CONTACT US</p>
                </a>
    
              </div>
              <div class="col-md-7 left2">
                <h4>SUBSCRIBE</h4>
                <form action="">
                  <label for="email">
                    <input type="email" name="email" id="email" placeholder="ENTER YOUR EMAIL HERE" required>
                  </label><br>
                  <a href="#" class="btn btn-outline-secondary">SUBSCRIBE NOW</a>
                </form>
              </div>
            </div>
          </div>
          <hr class="light">
          <div class="col-12 copyright">
            <div class="col-md-6">
              <h5>&copy; 2020 FIRST FOUNTAIN HOMES. ALL RIGHT RESERVED.</h5>
            </div>
            <div class="col-md-6 second">
              <h5><span>DESIGNED BY </span>GREENMOUSE TECHNOLOGIES</h5>
            </div>
          </div>
        </div>
      </div>
    </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#721922"/></svg></div>


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