<!-- Connect to DB -->
<?php
include('TirboConfig.php');

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySql: " . mysqli_connect_error();
}

//Information for Location Table

//logic show name value name case to ID 
$L_NAME = $_POST['L_NAME'];
$L_ADDRESS = $_POST['L_ADDRESS'];
$L_PHONE = $_POST['L_PHONE'];
$UNI_ID = $_POST['UNI_ID'];
$T_ID = $_POST['T_ID'];

//query for Location Table
mysqli_query($con,
    "INSERT INTO Location 
        (L_NAME,
         L_ADDRESS,
         L_PHONE,
         UNI_ID,
         T_ID
         )
    VALUES
        ('$L_NAME',
         '$L_ADDRESS',
         '$L_PHONE',
         '$UNI_ID',
         '$T_ID')");

header("Location: settings.html");
$con->close(); 
?>