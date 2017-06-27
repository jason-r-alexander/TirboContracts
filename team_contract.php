<!-- Connect to DB -->
<?php
include('TirboConfig.php');

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySql: " . mysqli_connect_error();
}


$AWAY_TEAM = $_POST['AwayTeam'];
$HOME_TEAM = $_POST['HomeTeam'];

mysqli_query($con, "INSERT INTO Team_Contract 
        (C_ID,
         T_HOME,
         T_AWAY)
    VALUES
        ((SELECT MAX(C_ID) FROM Contract),
         '$HOME_TEAM', 
         '$AWAY_TEAM')");

$con->close(); 
?>