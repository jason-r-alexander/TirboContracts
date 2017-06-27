<?php
include('TirboConfig.php');
include('login.php'); // Includes Login Script

// Create connection
$con=mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySql: " . mysqli_connect_error();
}

//Information for Athletic Director Table

$Email = $_SESSION['login_user'];
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
	 AD_PHONE,
	 AD_DEFAULT,
	 Email) 
	VALUES 
		('$AD_LAST_NAME',
		 '$AD_FIRST_NAME',
		 '$AD_EMAIL',
		 '$AD_PHONE',
		 '0',
		 '$Email')");


header("Location: settings.html");
$con->close(); 
?>

