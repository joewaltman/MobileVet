<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>VetPronto - Veterinary House Calls</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <!-- Required -->
    <link href="css/global-style.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="icon" href="images/textvetred.ico" type="image/x-icon"><!-- LayerSlider stylesheet -->
<link rel="stylesheet" href="assets/layerslider/css/layerslider.css" type="text/css">

<script src="//cdn.optimizely.com/js/1022550884.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47778113-5', 'vetpronto.com');
  ga('send', 'pageview');

</script>

</head>
<body>


<div class="wrapper">
	
    <!-- Header: Logo and Main Nav -->
    <header>    
    	<div id="navOne" class="navbar navbar-wp" role="navigation">
            <div class="container">
                <div class="navbar-header">
                	<button type="button" class="navbar-toggle navbar-toggle-aside-menu">
                        <i class="fa fa-outdent icon-custom"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html" title="VetPronto - Veterinary House Calls">
                    	<img src="images/VetProntoLogo.png" alt="VetPronto - Veterinary House Calls">
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                    	<li class="dropdown">
                        	<a href="index.html">Home</a>
                    	</li>
                        <li class="dropdown">
                        	<a href="#">How Much Does It Cost?</a>
                    	</li>
                        <li class="dropdown">
                        	<a href="team-member.html">Meet The Vet</a>
                    	</li>
                        <li class="active">
                        	<a href="sign-up.html" >Make An Appointment</a>
                    	</li>
                    </ul>
                   
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </header>
    <div class="pg-opt pin">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Sign Up</h2>
                </div>
                <div class="col-md-6" align="right">
                    <h2><a href="tel:18002393261">800 239 3261</a></h2>
                </div>
            </div>
        </div>
    </div>
    
    <section class="slice bg-3">
        <div class="w-section inverse">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="section-title">New client form</h3>
                        <p>
                        Tell us a little about yourself and your pet so we can give you the best possible treatment in a timely manner.
                        </p>

<?php
        // check for a successful form post
        if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";
        // check for a form error
        elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";
?>
                        
                        <form class="form-light mt-20" role="form" method="POST" action="contact-form-submission.php" >
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="client_name" class="form-control" placeholder="Your name">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="client_email" class="form-control" placeholder="Email address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" name="client_phone" class="form-control" placeholder="Phone number">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" id="address" name="client_address" placeholder="Address" style="height:80px;"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Pet Name</label>
                                <input type="text" name="pet_name" class="form-control" placeholder="Pet's Name">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pet Breed</label>
                                        <input type="text" name="pet_breed" class="form-control" placeholder="Pet's Breed">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pet Age</label>
                                        <input type="text" name="pet_age" class="form-control" placeholder="Pet's Age">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pet Gender</label>
                                        <input type="text" name="pet_gender" class="form-control" placeholder="Pet's Gender">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Spayed or Neutered?</label>
                                        <input type="text" name="pet_spayed_neutered" class="form-control" placeholder="Is your pet spayed or neutered?">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Vaccines</label>
                                <input type="text" name="pet_vaccines" class="form-control" placeholder="What vaccines has your pet had?">
                            </div>

                            <div class="form-group">
                                <label>Medications</label>
                                <input type="text" name="pet_medications" class="form-control" placeholder="Does your pet take medications?">
                            </div>

                            <div class="form-group">
                                <label>Health Problems</label>
                                <textarea class="form-control" id="health" name="pet_health_problems" placeholder="Any health problems current or past that we should know about." style="height:100px;"></textarea>
                            </div>

                            <button type="submit" class="btn btn-two">Submit</button>
                        </form>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="section-title">Business info</h3>
                                <div class="contact-info">
                                    <h5>Address</h5>
                                    <p>5th Avenue, New York - United States</p>
                                    
                                    <h5>Email</h5>
                                    <p>hello@webpixels.ro</p>
                                    
                                    <h5>Phone</h5>
                                    <p>+10 724 1234 567</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="section-title">Program</h3>
                                <div class="contact-info">
                                    <h5>Monday - Friday</h5>
                                    <p>10:00 AM - 6:00 PM</p>
                                    
                                    <h5>Saturday</h5>
                                    <p>Closed</p>
                                    
                                    <h5>Sunday</h5>
                                    <p>Closed</p>
                                </div>
                            </div>
                        </div>
                        <h3 class="section-title">Stay connected</h3>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur acing elit. Aenean esrsel piesn qersl ioinm sersoe non urna dolor aecena.
                        </p>
                        <div class="social-media">
                            <a href="#"><i class="fa fa-facebook facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus google"></i></a>
                            <a href="#"><i class="fa fa-twitter twitter"></i></a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    
    </section>


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                	<div class="col">
                       <h4>Contact us</h4>
                       <ul>
                           <li>2001 Westlake Ave N #45 Seattle - United States</li>
                           <li>Phone: +1 800 239 3261 </li>
                            <li>Email: <a href="mailto:hello@vetpronto.com" title="Email Us">hello@vetpronto.com</a></li>
                            <li>Caring for your pet is our passion</li>
                        </ul>
                     </div>
                </div>

                <div class="col-md-3">
                	<div class="col">
                        <h4>Mailing list</h4>
                        <p>Sign up if you would like to receive occasional treats from us.</p>
                        <form class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your email address...">
                                <span class="input-group-btn">
                                    <button class="btn btn-two" type="button">Go!</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-3">
                	<div class="col col-social-icons">
                        <h4>Follow us</h4>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-skype"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-flickr"></i></a>
                    </div>
                </div>

                 <div class="col-md-3">
                 	<div class="col">
                        <h4>About us</h4>
                        <p>
                        VetPronto is made with love and passion for your pet.
                        <br><br>
                        <a href="sign-up.html" class="btn btn-two">Try it now!</a>
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </footer>
    </div>

    <!-- JavaScript -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/jquery.easing.js"></script>

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- Plugins -->

    <script type="text/javascript" src="assets/page-scroller/jquery.ui.totop.min.js"></script>
    
    <script type="text/javascript" src="js/jquery.wp.custom.js"></script>
    <script type="text/javascript" src="js/jquery.wp.switcher.js"></script><script src="assets/layerslider/js/greensock.js" type="text/javascript"></script>

    <!-- LayerSlider script files -->
    <script src="assets/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
    <script src="assets/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
    <!-- Initializing the slider -->
    <script>
    	jQuery("#layerslider").layerSlider({
    		pauseOnHover: true,
    		autoPlayVideos: false,
    		skinsPath: 'assets/layerslider/skins/',
    		responsive: false,
    		responsiveUnder: 1280,
    		layersContainer: 1280,
    		skin: 'borderlessdark3d',
    		hoverPrevNext: true,
    	});
    </script>

    </body>
    </html>