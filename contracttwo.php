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

$AWAY_TEAM = $_SESSION['AWAY_TEAM'];
$HOME_TEAM = $_SESSION['HOME_TEAM'];


$sql = "SELECT MAX(C_ID) FROM Contract";
$result1 = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result1);
$MAX_C_ID = $row['MAX(C_ID)'];


   

//need to pass through the global variables here
mysqli_query($con, "INSERT INTO Team_Contract 
        (C_ID,
         T_HOME,
         T_AWAY)
    VALUES
		('$MAX_C_ID',
         '$HOME_TEAM', 
         '$AWAY_TEAM')");

//echo $MAX_C_ID.' '.$HOME_TEAM.' '.$AWAY_TEAM;

header("location: dashboard.php");
?>