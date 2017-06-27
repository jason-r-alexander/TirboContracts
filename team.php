<!-- Connect to DB -->
<?php
include('TirboConfig.php');

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySql: " . mysqli_connect_error();
}
//Information for Team Table
//logic show name value name case to ID 
$T_SPORT = $_POST['T_SPORT'];
$T_GENDER = $_POST['T_GENDER'];
$T_DIVISION = $_POST['T_DIVISION'];
$UNI_ID = $_POST['UNI_ID'];

//query for Team Table
mysqli_query($con,
    "INSERT INTO Team 
        (T_SPORT,
         T_GENDER,
         T_DIVISION,
         UNI_ID)
    VALUES
        ('$T_SPORT',
         '$T_GENDER',
         '$T_DIVISION',
         '$UNI_ID')");

header("Location: settings.html");
$con->close(); 
?>