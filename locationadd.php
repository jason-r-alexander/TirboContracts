<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Subscribe for TirboContracts</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="main.css" rel="stylesheet">


  </head>

  <style>
*::selection {
  background: lightblue;
  color: #000000;
}
*::-moz-selection {
  background: lightblue;
  color: #000000;
}
*::-webkit-selection {
  background: lightblue;
  color: #000000;
}
</style>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation http://stackoverflow.com/questions/20711891/php-easier-way-to-hide-show-menu-items-to-logged-in-logged-out-users-->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-youtube-play"></i>   TirboContracts
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
                        <a class="page-scroll" href="index.html#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.html#testimonials">Testimonials</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="subscribe.html">Subscribe</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">Login</a>
                    </li>
                    
                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="dashboard.php">Dashboard</a></li>
                                  <li><a href="settings.html">Account Settings</a></li>
                                  <li><a href="logout.php">Logout</a></li>
                                </ul>
                              </li>           
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

<hr class="featurette-divider-top">
    <!-- start login process here--> 

	<div class="container">

<form action='location.php' method='post' class="form-login"/>
    <h2 class="form-contract-c">Location Information</h2>

    <input type="text" name="L_NAME" class="form-control" placeholder="Name">
    <input type="text" name="L_ADDRESS" class="form-control" placeholder="Address">
    <input type="text" name="L_PHONE" class="form-control" placeholder="Phone">
    
<?php
include('TirboConfig.php');

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySql: " . mysqli_connect_error();
}

// QUERY FOR UNIVERSITY INFORMATION https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/6
    $result = $con->query("SELECT UNI_ID, UNI_NAME FROM University");
    

    echo "<select name='UNI_ID' class='form-control'>";
    echo "<option>Please Select a University</option>";

    while ($row = $result->fetch_assoc()) {

                  unset($UNI_ID, $UNI_NAME);
                  $UNI_ID = $row['UNI_ID'];
                  $UNI_NAME = $row['UNI_NAME']; 
                  echo '<option value="'.$UNI_ID.'">'.$UNI_NAME.' '.'</option>';
}
    echo "</select>";


// QUERY FOR TEAM INFORMATION https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/6
    $result = $con->query("SELECT T_ID, T_GENDER, T_SPORT FROM Team");
    

    echo "<select name='T_ID' class='form-control'>";
    echo "<option>Please Select a Team</option>";

    while ($row = $result->fetch_assoc()) {

                  unset($T_ID, $T_GENDER, $T_SPORT);
                  $T_ID = $row['T_ID'];
                  $T_SPORT = $row['T_SPORT'];
                  $T_GENDER = $row['T_GENDER']; 
                  echo '<option value="'.$T_ID.'">'.$T_GENDER.' '.$T_SPORT.'</option>';
}
    echo "</select>";

// Close connection
mysqli_close($con);
?>

	<button class="btn btn-lg btn-primary btn-block" type="submit" href="">Submit</button>
</form>
</div> <!--/container -->
     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" 
crossorigin="anonymous"></script>

  </body>
</html>