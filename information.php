<!-- Connect to DB -->
<?php
include('TirboConfig.php');

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySql: " . mysqli_connect_error();
}

//Information for Athletic Director Table
$AD_FIRST_NAME = $_POST['AD_FIRST_NAME'];
$AD_LAST_NAME = $_POST['AD_LAST_NAME'];
$AD_EMAIL = $_POST['AD_EMAIL'];
$AD_PHONE = $_POST['AD_PHONE'];

//query for Athletic Director Table
mysqli_query($con,
    "INSERT INTO Athletic_Director 
        (AD_LAST_NAME,
         AD_FIRST_NAME,
         AD_EMAIL,
         AD_PHONE)
    VALUES
        ('$AD_LAST_NAME',
         '$AD_FIRST_NAME',
         '$AD_EMAIL',
         '$AD_PHONE')");

//Information for University Table
$UNI_NAME = $_POST['UNI_NAME'];
$UNI_ADDRESS = $_POST['UNI_ADDRESS'];
$UNI_PHONE = $_POST['UNI_PHONE'];
$UNI_FAX = $_POST['UNI_FAX'];

//query for University Table

//logic show name value email case to ID 
mysqli_query($con,
    "INSERT INTO University 
        (UNI_NAME,
         UNI_ADDRESS,
         UNI_PHONE,
         UNI_FAX)
    VALUES
        ('$UNI_NAME',
         '$UNI_ADDRESS',
         '$UNI_PHONE',
         '$UNI_FAX')");

//Information for Location Table

//logic show name value name case to ID 
$L_ADDRESS = $_POST['L_ADDRESS'];
$L_PHONE = $_POST['L_PHONE'];
$UNI_ID = $_POST['UNI_ID'];

//query for Location Table
mysqli_query($con,
    "INSERT INTO Location 
        (L_ADDRESS,
         L_PHONE,
         UNI_ID,
         AD_PHONE)
    VALUES
        ('$L_ADDRESS',
         '$L_PHONE',
         '$UNI_ID')");

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
         '$UNI_ID')");


//header("location: dashboard.html");

$con->close(); 
?>