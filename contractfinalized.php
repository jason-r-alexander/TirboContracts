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

    <title>View a Contract</title>

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
button, input, select, textarea {
    color:black;
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

<!--  Begin Contract   -->

<!-- Open DB Connection -->
<?php
include('TirboConfig.php');

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySql: " . mysqli_connect_error();
}
?>

<div class="container">

<a class="btn btn-default" href="dashboard.php" role="button" align="center">Back to Dashboard&raquo;</a>
<br>

<form action='contract.php' method='post' class="form-contract-create"/>
    <h2 class="form-contract-c">Create A New Contract</h2>

<hr class="featurette-divider-top">

<div class="row">
  <div class="col-md-4">
      <p><span style="font-size:40px;"><b>TirboContracts</b></span></p>
  </div>

  <div class="col-md-8">
      <p align="right" style="margin-left:1.75in;">Center for Intercollegiate Athletics</p>
  </div>
</div>

<div class="row">
  <div class="col-md-6"></div>
  <div class="col-md-6">

<?php
$id=$_GET['id'];
//echo $id;


$sql = "SELECT 
          C.L_ID, 
          (CASE 
            C.L_ID 
            WHEN C.L_ID 
            THEN CONCAT(L.L_NAME,', ',L.L_ADDRESS,' ---- Phone: ',L.L_PHONE) 
          END) LOCATION 
        FROM Contract C, Location L 
        WHERE C.L_ID = L.L_ID AND C_ID=$id";

$result1 = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result1);
$L = $row['LOCATION'];

//echo $L;

  echo '<text class="form-control">'.$L.'</text>';
  //'<option value="'.$L_ID.'">'.$L_NAME.', '.$L_ADDRESS.' ---- Phone: '.$L_PHONE.'</option>';
?>

  </div>
</div>

<p align="center">&nbsp;</p>

<div class="row">
  <p align="center"><b>ARTICLES OF AGREEMENT</b></p>
</div>

<div class="row">
  <p align="center"><b>BETWEEN</b></p>
</div>

<div class="row">
  <div class="col-md-5">
      <p>
<?php

$id=$_GET['id'];

$sql = "SELECT T_AWAY FROM Team_Contract WHERE C_ID = $id";

$result1 = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result1);
$AT_ID = $row['T_AWAY'];

//echo $HT_ID;

$sql2 = "SELECT UNI_NAME FROM University WHERE UNI_ID = $AT_ID";

$result2 = mysqli_query($con, $sql2);
$row = mysqli_fetch_array($result2);
$AT = $row['UNI_NAME'];

//echo $HT;

  echo '<text class="form-control">'.$AT.'</text>';

?>
      </p>
  </div>

  <div class="col-md-2">
      <p align="center"><b>AND</b></p>
  </div>

  <div class="col-md-5">
      <p>
<?php

$id=$_GET['id'];

$sql = "SELECT T_HOME FROM Team_Contract WHERE C_ID = $id";

$result1 = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result1);
$HT_ID = $row['T_HOME'];

//echo $HT_ID;

$sql2 = "SELECT UNI_NAME FROM University WHERE UNI_ID = $HT_ID";

$result2 = mysqli_query($con, $sql2);
$row = mysqli_fetch_array($result2);
$HT = $row['UNI_NAME'];

//echo $HT;

  echo '<text class="form-control">'.$HT.'</text>';

?>
      </p>
  </div>
</div>

<div class="row">
  <p align="center">1. It is agreed that the teams representing the above schools shall meet under the following conditions:</p>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>Sport:</b> </p>
  </div>
  <div class="col-md-10">
<?php

$id=$_GET['id'];

$sql = "SELECT C_SPORT FROM Contract WHERE C_ID = $id";

$result1 = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result1);
$C_SPORT = $row['C_SPORT'];

  echo '<text class="form-control">'.$C_SPORT.'</text>';

?>    
  </div>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>Site:</b> </p>
  </div>
  <div class="col-md-10">
<?php

$id=$_GET['id'];

$sql = "SELECT C_SITE FROM Contract WHERE C_ID = $id";

$result1 = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result1);
$C_SITE = $row['C_SITE'];

  echo '<text class="form-control">'.$C_SITE.'</text>';

?>
  </div>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>Date:</b> </p>
  </div>
  <div class="col-md-10">
      <?php 
      $id=$_GET['id'];

        $sql = "SELECT C_DATE FROM Contract WHERE C_ID = $id";

        $result1 = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result1);
        $C_DATE = $row['C_DATE'];

          echo '<text class="form-control">'.$C_DATE.'</text>';
          ?>

  </div>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>Start Time:</b></p>
  </div>
  <div class="col-md-10">
       <?php 
      $id=$_GET['id'];

        $sql = "SELECT C_START_TIME FROM Contract WHERE C_ID = $id";

        $result1 = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result1);
        $C_START_TIME = $row['C_START_TIME'];

          echo '<text class="form-control">'.$C_START_TIME.'</text>';
          ?>
  </div>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>End Time:</b></p>
  </div>
  <div class="col-md-10">
      <?php 
      $id=$_GET['id'];

        $sql = "SELECT C_END_TIME FROM Contract WHERE C_ID = $id";

        $result1 = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result1);
        $C_END_TIME = $row['C_END_TIME'];

          echo '<text class="form-control">'.$C_END_TIME.'</text>';
          ?>
  </div>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>Rules:</b></p>
  </div>
  <div class="col-md-10">
      <?php 
      $id=$_GET['id'];

        $sql = "SELECT C_RULES FROM Contract WHERE C_ID = $id";

        $result1 = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result1);
        $C_RULES = $row['C_RULES'];

          echo '<text class="form-control">'.$C_RULES.'</text>';
          ?>
  </div>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>Officials:</b></p>
  </div>
  <div class="col-md-10">
<?php

$id=$_GET['id'];

$sql = "SELECT 
          (CASE
            C.R_ID
            WHEN C.R_ID
            THEN R.R_NAME
          END) REFREE
        FROM Contract C, Referee R 
        WHERE C.R_ID = R.R_ID
              AND C.C_ID = $id";

        $result1 = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result1);
        $REFREE = $row['REFREE'];

          echo '<text class="form-control">'.$REFREE.'</text>';

?>
  </div> 
</div>

<div class="row">
  <p align="center">2. Other provisions, if any, shall be in accordance with the following:</p>
</div>

<div class="row">
  <p align="center">
    <?php 
      $id=$_GET['id'];

        $sql = "SELECT C_COMMENTS FROM Contract WHERE C_ID = $id";

        $result1 = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result1);
        $C_COMMENTS = $row['C_COMMENTS'];

          echo '<textarea class="form-control">'.$C_COMMENTS.'</textarea>';
          ?>
  </p>
</div>

<div class="row">
  <div class="col-md-6">
    <p align="center"><b><u>Away University</u></b></p>
  </div>
  <div class="col-md-6">
    <p align="center"><b><u>Home University</u></b></p>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
      <p align="left">
        <?php

          $id=$_GET['id'];

          $sql = "SELECT T_AWAY FROM Team_Contract WHERE C_ID = $id";

          $result1 = mysqli_query($con, $sql);
          $row = mysqli_fetch_array($result1);
          $AT_ID = $row['T_AWAY'];

          //echo $HT_ID;

          $sql2 = "SELECT UNI_NAME FROM University WHERE UNI_ID = $AT_ID";

          $result2 = mysqli_query($con, $sql2);
          $row = mysqli_fetch_array($result2);
          $AT = $row['UNI_NAME'];

          //echo $HT;

            echo '<text class="form-control">'.$AT.'</text>';

          ?>
    </p>
    </div>
  <div class="col-md-6">
      <p align="left">
        <?php

          $id=$_GET['id'];

          $sql = "SELECT T_HOME FROM Team_Contract WHERE C_ID = $id";

          $result1 = mysqli_query($con, $sql);
          $row = mysqli_fetch_array($result1);
          $HT_ID = $row['T_HOME'];

          //echo $HT_ID;

          $sql2 = "SELECT UNI_NAME FROM University WHERE UNI_ID = $HT_ID";

          $result2 = mysqli_query($con, $sql2);
          $row = mysqli_fetch_array($result2);
          $HT = $row['UNI_NAME'];

          //echo $HT;

            echo '<text class="form-control">'.$HT.'</text>';

          ?>
    </p>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <p align="center">
<?php 
      $id=$_GET['id'];

        $sql = "SELECT C_AD_H FROM Contract WHERE C_ID = $id";

        $result1 = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result1);
        $C_AD_H = $row['C_AD_H'];

          echo '<text class="form-control">'.$C_AD_H.'</text>';
          ?>

    </p>
  </div>

<div class="row">
  <div class="col-md-6">  
    <p align="center">
<?php 
      $id=$_GET['id'];

        $sql = "SELECT C_AD_A FROM Contract WHERE C_ID = $id";

        $result1 = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result1);
        $C_AD_A = $row['C_AD_A'];

          echo '<text class="form-control">'.$C_AD_A.'</text>';
          ?>
    </p>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <p align="center"><b>Signature</b>
      <input type="checkbox" onclick="agreeA()" id="AwaySignature" name="AwaySignature" class="form-control" checked required autofocus/> Accept the terms of the contract
    </p>
  </div>

  <div class="col-md-6">
    <p align="center"><b>Signature</b>
      <input type="checkbox" onclick="agreeH()" id="HomeSignature" name="HomeSignature" class="form-control" checked required autofocus/> Accept the terms of the contract
    </p>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <p align="center"><b>DATE</b>
     <?php 
      $id=$_GET['id'];

        $sql = "SELECT C_SIGNED_A_DATE FROM Contract WHERE C_ID = $id";

        $result1 = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result1);
        $C_SIGNED_A_DATE = $row['C_SIGNED_A_DATE'];

          echo '<text class="form-control">'.$C_SIGNED_A_DATE.'</text>';
          ?>
    </p>
  </div>

  <div class="col-md-6">
    <p align="center"><b>DATE</b>
      <?php 
      $id=$_GET['id'];

        $sql = "SELECT C_SIGNED_H_DATE FROM Contract WHERE C_ID = $id";

        $result1 = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result1);
        $C_SIGNED_H_DATE = $row['C_SIGNED_H_DATE'];

          echo '<text class="form-control">'.$C_SIGNED_H_DATE.'</text>';
          ?>
    </p>
  </div>
</div>

<!--<p align="center">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Create Contract</button>
</p>-->

<a class="btn btn-default" href="dashboard.php" role="button" align="center">Back to Dashboard&raquo;</a>
<br>

</form>

<!-- Clost DB Connection -->
<?php
// Close connection
mysqli_close($con);
?>

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