<!-- Connect to DB -->
<?php
include('TirboConfig.php');
// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySql: " . mysqli_connect_error();
}

session_start();
$_SESSION['AWAY_TEAM'] = $_POST['AwayTeam'];
$_SESSION['HOME_TEAM'] = $_POST['HomeTeam'];

//get the global variables to work so that we can pass these to contracttwo.php 
//$GLOBALS['AWAY_TEAM'] = $_POST['AwayTeam'];
//$GLOBALS['HOME_TEAM'] = $_POST['HomeTeam'];

//$AWAY_TEAM = $_POST['AwayTeam'];
//$HOME_TEAM = $_POST['HomeTeam'];
$L_ID = $_POST['Location'];
$C_SPORT = $_POST['Sport'];
$C_SITE = $_POST['Site'];
$C_DATE = $_POST['Date']; 
$C_START_TIME = $_POST['StartTime']; 
$C_END_TIME = $_POST['EndTime'];
$C_RULES = $_POST['Rule']; 
$R_ID = $_POST['Official'];
$C_COMMENTS = $_POST['Comments'];
$C_AD_A = $_POST['AwayAD'];
$C_AD_H = $_POST['HomeAD'];
$C_SIGNED_A = $_POST['AwaySignature'];
$C_SIGNED_H = $_POST['HomeSignature'];
$C_SIGNED_A_DATE = $_POST['SignDate_A'];
$C_SIGNED_H_DATE = $_POST['SignDate_H']; 

$STRdate = strtotime(date('m/d/Y'));

$DATE = date('Y-m-d',$STRdate);

//echo $DATE;


/* Readd '$C_SIGNED_H' and '$C_SIGNED_A' once we add signature value to user*/
mysqli_query($con, "INSERT INTO Contract 
        (L_ID,
         R_ID,
         C_SPORT,
         C_SITE,
         C_START_TIME, 
         C_END_TIME, 
         C_DATE, 
         C_RULES, 
         C_COMMENTS,
         C_AD_H, 
         C_SIGNED_H,
         C_SIGNED_H_DATE,
         C_AD_A,
         C_SIGNED_A,
         C_SIGNED_A_DATE
         )
    VALUES
        ('$L_ID',
         '$R_ID',
         '$C_SPORT',
         '$C_SITE',
         '$C_START_TIME', 
         '$C_END_TIME', 
         '$C_DATE', 
         '$C_RULES', 
         '$C_COMMENTS',
         '$C_AD_H',
         'TEST_HOME',
         '$DATE',
         '$C_AD_A',
         'TEST_AWAY',
         '$DATE')");


/* 99% sure we need this to be a different page*/
/*if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);
    //echo "New record created successfully. Last inserted ID is: " . $last_id;
    $C_ID = $last_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}*/

//echo $AWAY_TEAM;
//echo $HOME_TEAM;
header("location: contracttwo.php");

$con->close(); 
?>