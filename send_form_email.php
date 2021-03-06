<?php
$client_name = $_POST["firstName"] . " " . $_POST['lastName'];
$client_email = $_POST["txtEmail"];
$client_phone = $_POST["phoneNumber"];
$appt_time = $_POST["apptTime"];
$appt_reason = $_POST["reason"];

if (strlen ( $client_name) < 2)
    $error = "You must enter your name.";
elseif (empty($client_email))
    $error = "You must enter your email address.";
elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $client_email))
    $error = "You must enter a valid email address.";
elseif (strlen ($client_phone) < 10)
    $error = "You must enter a valid phone number.";

// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header("Location: sign-up.html?e=".urlencode($error)); exit;
}

$to = 'joe@vetrounds.com' ;     //put your email address on which you want to receive the information
$subject = 'Appointment request at VetPronto';   //set the subject of email.
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$email_content = "Name:<br>$client_name<br><br>";
$email_content .= "Email:<br>$client_email<br><br>";
$email_content .= "Phone:<br>$client_phone<br><br>";
$email_content .= "Time:<br>$appt_time<br><br>";
$email_content .= "Reason:<br>$appt_reason<br><br>";

mail($to, $subject, $email_content, $headers);
?>

<html>
<head>
	<meta charset="utf-8">
    <title>VetPronto - Veterinary House Calls</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <!-- Required -->
    <link href="css/global-style.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="icon" href="images/favicon.png" type="image/png"><!-- LayerSlider stylesheet -->
<link rel="stylesheet" href="assets/layerslider/css/layerslider.css" type="text/css">

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
    <!-- Google Code for Request Appointment Conversion Page -->
    <script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 1064390028;
    var google_conversion_language = "en";
    var google_conversion_format = "3";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "XZ79CPzTrAkQjJvF-wM";
    var google_remarketing_only = false;
    /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
    <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1064390028/?label=XZ79CPzTrAkQjJvF-wM&amp;guid=ON&amp;script=0"/>
    </div>
    </noscript>

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
                    	<a href="pricing.html">How Much Does It Cost?</a>
                	</li>
                    <li class="dropdown">
                    	<a href="team-member.html">Meet The Vet</a>
                	</li>
                    <li class="active">
                    	<a href="#" >Make An Appointment</a>
                	</li>
                </ul>
               
            </div><!--/.nav-collapse -->
        </div>
    </div>
</header>
<br><br><br><br>
                        <div class="text-center">
                            <?php
        // check for a successful form post
        if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";
        // check for a form error
        elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";
?>
                            <h3>Thanks for requesting an appointment. We will contact you shortly to schedule your appointment</h3>
                        </div>
                            <br><br><br><br>
                            
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
                                                    <a href="#" class="btn btn-two">Try it now!</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </footer></div>

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
                            <script type="text/javascript" src="js/jquery.wp.switcher.js"></script>
                            </body>
                            </html>

                            <?php
    header("Location: sign-up.html?s=".urlencode("Success!  Someone will contact you shortly to confirm the appointment")); exit;
    ?>