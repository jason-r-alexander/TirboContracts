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

    <title>Create a Contract</title>

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
                        <a href="#page-top"></a>
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
echo $id;

    // QUERY FOR ATHLETIC DIRECTOR INFORMATION https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/6
    $result = $con->query("SELECT L_ID, L_NAME, L_ADDRESS, L_PHONE FROM Location");
    

    echo "<select name='Location' id='inputLocation' class='form-control'>";
    echo "<option>Please Select a Location</option>";

    while ($row = $result->fetch_assoc()) {

                  unset($L_ID, $L_NAME, $L_ADDRESS, $L_PHONE);
                  $L_ID = $row['L_ID'];
                  $L_NAME = $row['L_NAME'];
                  $L_ADDRESS = $row['L_ADDRESS'];
                  $L_PHONE = $row['L_PHONE']; 
                  echo '<option value="'.$L_ID.'">'.$L_NAME.', '.$L_ADDRESS.' ---- Phone: '.$L_PHONE.'</option>';
}
    echo "</select>";
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
    // QUERY FOR ATHLETIC DIRECTOR INFORMATION https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/6
    $result = $con->query("SELECT UNI_ID, UNI_NAME FROM University");
    

    echo "<select name='AwayTeam' id='AwayTeam' class='form-control' onchange='AwayTeamFunc()'>";
    echo "<option>Select a Away Team</option>";

    while ($row = $result->fetch_assoc()) {

                  unset($UNI_ID_A, $UNI_NAME);
                  $UNI_ID_A = $row['UNI_ID'];
                  $UNI_NAME_A = $row['UNI_NAME']; 
                  echo '<option value="'.$UNI_ID_A.'">'.$UNI_NAME_A.'</option>';
}
    echo "</select>";
?>
      </p>
  </div>

  <div class="col-md-2">
      <p align="center"><b>AND</b></p>
  </div>

  <div class="col-md-5">
      <p>
<?php
    // QUERY FOR ATHLETIC DIRECTOR INFORMATION https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/6
    $result = $con->query("SELECT UNI_ID, UNI_NAME FROM University");
    

    echo "<select name='HomeTeam' id='HomeTeam' class='form-control' onchange='HomeTeamFunc()'>";
    echo "<option>Select a Home Team</option>";

    while ($row = $result->fetch_assoc()) {

                  unset($UNI_ID_H, $UNI_NAME);
                  $UNI_ID_H = $row['UNI_ID'];
                  $UNI_NAME_H = $row['UNI_NAME']; 
                  echo '<option value="'.$UNI_ID_H.'">'.$UNI_NAME_H.'</option>';
}
    echo "</select>";
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
    // QUERY FOR ATHLETIC DIRECTOR INFORMATION https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/6
    $result = $con->query("SELECT T_SPORT, T_GENDER FROM Team");
    

    echo "<select name='Sport' class='form-control'>";
    echo "<option>Please Select a Sport</option>";

    while ($row = $result->fetch_assoc()) {

                  unset($T_SPORT, $T_GENDER);
                  $T_SPORT = $row['T_SPORT'];
                  $T_GENDER = $row['T_GENDER'];
                  echo '<option>'.$T_GENDER.' '.$T_SPORT.'</option>';
}
    echo "</select>";
?>    
  </div>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>Site:</b> </p>
  </div>
  <div class="col-md-10">
<?php
    // QUERY FOR ATHLETIC DIRECTOR INFORMATION https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/6
    $result = $con->query("SELECT L_ID, L_NAME, L_ADDRESS, L_PHONE FROM Location");
    

    echo "<select name='Site' class='form-control'>";
    echo "<option>Please Select a Site</option>";

    while ($row = $result->fetch_assoc()) {

                  unset($L_NAME);
                  $L_NAME = $row['L_NAME'];
                  echo '<option >'.$L_NAME.'</option>';
}
    echo "</select>";
?>
  </div>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>Date:</b> </p>
  </div>
  <div class="col-md-10">
      <input name="Date" class="form-control" type="date" name="Date" required autofocus/>
  </div>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>Start Time:</b></p>
  </div>
  <div class="col-md-10">
      <input name="StartTime" class="form-control" type="time" name="Time" required autofocus/>
  </div>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>End Time:</b></p>
  </div>
  <div class="col-md-10">
      <input name="EndTime" class="form-control" type="time" name="Time" required autofocus/>
  </div>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>Rules:</b></p>
  </div>
  <div class="col-md-10">
      <select name="Rule" class="form-control" required autofocus/>
          <option>Select a Set of Rules</option>
          <option>NCAA</option>
          <option>ITA</option>
      </select>
  </div>
</div>

<div class="row">
  <div class="col-md-2">
      <p><b>Officials:</b></p>
  </div>
  <div class="col-md-10">
<?php
    // QUERY FOR ATHLETIC DIRECTOR INFORMATION https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/6
    $result = $con->query("SELECT R_ID, R_NAME FROM Referee");
    

    echo "<select name='Official' class='form-control'>";
    echo "<option>Please Select an Official</option>";

    while ($row = $result->fetch_assoc()) {

                  unset($R_ID, $R_NAME);
                  $R_ID = $row['R_ID'];
                  $R_NAME = $row['R_NAME'];
                  echo '<option value="'.$R_ID.'">'.$R_NAME.'</option>';
}
    echo "</select>";
?>
  </div> 
</div>

<div class="row">
  <p align="center">2. Other provisions, if any, shall be in accordance with the following:</p>
</div>

<div class="row">
  <p align="center">
    <textarea name="Comments" type="text" rows="4" id="inputComments" class="form-control" placeholder="Comments"></textarea>
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
        <text type="text" id="AwayTeamValue" name="AwayREAD" class="form-control" required autofocus/>
    </p>
    </div>
  <div class="col-md-6">
      <p align="left">
        <text type="text" id="HomeTeamValue" name="HomeREAD" class="form-control" required autofocus/>
    </p>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <p align="center">
<?php
    // QUERY FOR ATHLETIC DIRECTOR INFORMATION https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/6
    $result = $con->query("SELECT AD_ID, AD_LAST_NAME, AD_FIRST_NAME FROM Athletic_Director");
    

    echo "<select name='AwayAD' class='form-control'>";
    echo "<option>Please Select the Away Athletic Director</option>";

    while ($row = $result->fetch_assoc()) {

                  unset($AD_ID, $AD_LAST_NAME, $AD_FIRST_NAME);
                  $AD_ID = $row['AD_ID'];
                  $AD_LAST_NAME = $row['AD_LAST_NAME'];
                  $AD_FIRST_NAME = $row['AD_FIRST_NAME'];
                  echo '<option>'.$AD_FIRST_NAME.' '.$AD_LAST_NAME.'</option>';
}
    echo "</select>";
?>

    </p>
  </div>

<div class="row">
  <div class="col-md-6">  
    <p align="center">
<?php
    // QUERY FOR ATHLETIC DIRECTOR INFORMATION https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/6
    $result = $con->query("SELECT AD_ID, AD_LAST_NAME, AD_FIRST_NAME FROM Athletic_Director");
    

    echo "<select name='HomeAD' class='form-control'>";
    echo "<option>Please Select the Home Athletic Director</option>";

    while ($row = $result->fetch_assoc()) {

                  unset($AD_ID, $AD_LAST_NAME, $AD_FIRST_NAME);
                  $AD_ID = $row['AD_ID'];
                  $AD_LAST_NAME = $row['AD_LAST_NAME'];
                  $AD_FIRST_NAME = $row['AD_FIRST_NAME'];
                  echo '<option>'.$AD_FIRST_NAME.' '.$AD_LAST_NAME.'</option>';
}
    echo "</select>";
?>
    </p>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <p align="center"><b>Signature</b>
      <input type="checkbox" onclick="agreeA()" id="AwaySignature" name="AwaySignature" class="form-control" required autofocus/> Accept the terms of the contract
    </p>
  </div>

  <div class="col-md-6">
    <p align="center"><b>Signature</b>
      <input type="checkbox" onclick="agreeH()" id="HomeSignature" name="HomeSignature" class="form-control" required autofocus/> Accept the terms of the contract
    </p>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <p align="center"><b>DATE</b>
      <text type="Date" id="SignDate_A" name="SignDate_A" class="form-control" value="2016-04-27" required autofocus/>
    </p>
  </div>

  <div class="col-md-6">
    <p align="center"><b>DATE</b>
      <text type="Date" id="SignDate_H" name="SignDate_H" class="form-control" required autofocus/>
    </p>
  </div>
</div>

<p align="center">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Create Contract</button>
</p>


</form>

<a class="btn btn-default" href="dashboard.php" role="button" align="center">Back to Dashboard&raquo;</a>
<br>

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

    <script>
        function AwayTeamFunc() {
            var x = document.getElementById("AwayTeam").selectedOptions[0].text;
            document.getElementById("AwayTeamValue").innerHTML = x;
        }
        </script>

        <script>
        function HomeTeamFunc() {
            var y = document.getElementById("HomeTeam").selectedOptions[0].text;
            document.getElementById("HomeTeamValue").innerHTML = y;
        }
    </script>

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

    <script>
    function agreeA() {
      var AwaySignature = document.getElementById('AwaySignature');
      var d = new Date();
      var n = (d.getMonth() + 1) + '/' + d.getDate() + '/' +  d.getFullYear();

      if (AwaySignature.checked) {
        alert("Clicking this box means that you agree to the terms and conditions of this legaly binding contract.");
        document.getElementById('SignDate_A').innerHTML = n;
        document.getElementById('SignDate_A').value = n;     
      } 
      else {
        //alert("You have elected to not agree to the terms and conditions of this legaly binding contract.");
        document.getElementById('SignDate_A').innerHTML = null;
      }
    }

    function agreeH() {
      var HomeSignature = document.getElementById('HomeSignature');
      var d = new Date();
      var n = (d.getMonth() + 1) + '/' + d.getDate() + '/' +  d.getFullYear();

      if (HomeSignature.checked) {
        alert("Clicking this box means that you agree to the terms and conditions of this legaly binding contract.");
        document.getElementById('SignDate_H').innerHTML = n;
      } 
      else {
        //alert("You have elected to not agree to the terms and conditions of this legaly binding contract.");
        document.getElementById('SignDate_H').innerHTML = null;
      }
    }
    </script>

</body>

</html>