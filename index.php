<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
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
                        <a href="check.php"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="check.php">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="check.php">Testimonials</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="subscribe.html">Subscribe</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">Login</a>
                    </li>
                    
                    <!--<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="dashboard.html">Dashboard</a></li>
                                  <li><a href="settings.html">Account Settings</a></li>
                                  <li><a href="logout.php">Logout</a></li>
                                </ul>
                              </li>   -->        
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
    
<div class="container">
    <form action="" method="post" class="form-login" style="max-width:330px">
    	<h2 class="form-login-heading">Login</h2>
        <div class="row">
            
    		  <input id="inputEmail" class="form-control" name="Email" placeholder="Email" type="text" required autofocus>
    		
             
              <input id="inputPassword" class="form-control" name="userpassword" placeholder="**********" type="password" required autofocus>
            
    	</div>
        <div class="row">
            <span style="color:red"><?php echo $error; ?></span>
    		<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value=" Login ">Login</button>
        </div>
    </form>
</div>

</body>
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

</html>