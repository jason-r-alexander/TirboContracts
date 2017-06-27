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
$UNI_NAME = $_POST['UNI_NAME'];
$UNI_ADDRESS = $_POST['UNI_ADDRESS'];
$UNI_PHONE = $_POST['UNI_PHONE'];
$UNI_FAX = $_POST['UNI_FAX'];
$AD_ID = $_POST['AD_ID'];



//query for University Table
//logic show name value email case to ID 
mysqli_query($con,
    "INSERT INTO University 
        (UNI_NAME,
         UNI_ADDRESS,
         UNI_PHONE,
         UNI_FAX,
         AD_ID)
    VALUES
        ('$UNI_NAME',
         '$UNI_ADDRESS',
         '$UNI_PHONE',
         '$UNI_FAX',
         '$AD_ID')");


header("Location: settings.html");
$con->close(); 
?>
