<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
}
else header("location: index.html");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <title>TirboContracts</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Custom CSS -->   
    <link href="main.css" rel="stylesheet">
    
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation http://stackoverflow.com/questions/20711891/php-easier-way-to-hide-show-menu-items-to-logged-in-logged-out-users-->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <img src="Images/Logo.png" style="height:auto; width:170px; margin-top:-28px;">
                </a>
            </div>
    
    <!--nav bar start --> 
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="index.html#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#testimonials">Testimonials</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="subscribe.html">Subscribe</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">Login</a>
                    </li>

                    <?php
                      include('login.php'); // Includes Login Script

                      if(isset($_SESSION['login_user'])){
                        echo '<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION['login_user'].'<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="dashboard.php">Dashboard</a></li>
                                  <li><a href="settings.html">Account Settings</a></li>
                                  <li><a href="logout.php">Logout</a></li>
                                </ul>
                              </li> '; 
                    }
                    ?>
    
                  </ul>
                </div>

            <!-- /.navbar-collapse -->

            <script>
            $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
            });
            </script>

        </div>
        <!-- /.container -->
    </nav>          

<!-- New carousel 3/1/16 -->
<!--<section class="section-white">
  <div class="container">-->

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="Images/lax.jpg" alt="...">
          <div class="carousel-caption">
            <h3>Heading</h3>
          </div>
        </div>
        <div class="item">
          <img src="Images/soccer.jpg" alt="...">
          <div class="carousel-caption">
            <h3>Heading</h3>
          </div>
        </div>
        <div class="item">
          <img src="Images/hockey.jpg" alt="...">
          <div class="carousel-caption">
            <h3>Heading</h3>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>

  </div>
</section>
<!-- End of new carousel-->


    <!-- About Section -->
    <section id="about" class="container content-section text-center">
           <!-- START THE FEATURETTES -->
<h2>About TirboContracts</h2>
   <hr class="featurette-divider-about">

      <div id="rit_testimonial" class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">TirboContracts<span class="text-muted"><br>Contract Management System</span></h2>
          <p class="lead">Tirbo Contracts will save you time, money, and headaches. We have created this revolutionary online portal to solve our own frustrations that we faced everyday.</p>
        </div>
        <div class="col-md-5">
          <img class="img-circle" src="Images/Logo.png" alt="Generic placeholder image" width="200" height="200">
        </div>
      </div>

      <hr class="featurette-divider">

      <div id="clarkson_testimonial" class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Meet Braden<span class="text-muted"><br>RIT Student</span></h2>
          <p class="lead">Braden Wallace is a fourth year Marketing Major in The Saunders College of Business at RIT. The idea for Tirbo Contracts began while on co-op for the RIT Athletic Department. Completing athletic contracts was a large part of Braden's co-op and he thought there must be a better way. Braden is also a member of the Men's Varsity Lacrosse Team at RIT.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="img-circle" src="/Images/Braden.jpg" alt="Generic placeholder image" width="200" height="200">
        </div>
      </div>

      <hr class="featurette-divider">

      <div id="rit_testimonial" class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">BTP<span class="text-muted"><br>Business Club at RIT</span></h2>
          <p class="lead">Founded in 2013 at the Rochester Institute of Technology, the Business and Technology Professionals Club was established for its members to develop a diverse technical skill base, sharpen business acumen, and network with other tech-forward business professionals. Rewarding and challenging projects like TirboContracts help accomplish these goals, while also serving the RIT community.</p>
        </div>
        <div class="col-md-5">
          <img class="img-circle" src="/Images/BTP.png" alt="Generic placeholder image" width="200" height="200">
        </div>
      </div>

      <hr class="featurette-divider">
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="content-section text-center">
        <!-- Three columns of text below the carousel -->
        <h2>Testimonials</h2>
      <div class="row">
        <div class="col-lg-4">
          <img class="img" src="http://edge.rit.edu/content/P13621/public/Photo%20Gallery/sponsor.jpg" alt="Generic placeholder image" width="200" height="200">
          <h2>RIT</h2>
          <p id="ellipsis-p">
          Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="testimonials.html#rit_testimonial" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img" src="https://pbs.twimg.com/profile_images/515511357240664066/bSOQeHa-.jpeg" alt="Generic placeholder image" width="200" height="200">
          <h2>Heading</h2>
          <p id="ellipsis-p">
          Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="testimonials.html#clarkson_testimonial" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img" src="http://blogs.hudsonvalley.com/file/import/a9c69364-fe3a-4934-8b5f-1ade184f00fc.gif" alt="Generic placeholder image" width="200" height="200">
          <h2>Heading</h2>
          <p id="ellipsis-p">
          Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="testimonials.html#rpi_testimonial" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    </section>

    <!-- Subscribe Section -->
    <section id="subscribe" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Subscribe to TirboContracts</h2>
                <p><a class="btn btn-default" href="subscribe.html" role="button">Subscribe &raquo;</a></p>

                <p>Feel free to email us with any technical concerns</p>
                <p><a href="mailto:tirbocontracts@gmail.com">tirbocontracts@gmail.com</a>
                </p>
                <!--
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
                -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Business & Technology Professionals 2016</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>
