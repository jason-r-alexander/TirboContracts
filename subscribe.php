<?php
include('TirboConfig.php'); 
$firstName =$_POST['firstName']; 
$lastName = $_POST['lastName'];
$email =$_POST['Email']; 
$userpassword = $_POST['Password'];
$confirmEmail = $_POST['confirmEmail'];
$confirmPassword = $_POST['confirmPassword'];

//$servername = "tirbocontracts.scb.rit.edu";
//$username = "admin";
//$password = "4zBqmLt4uSxB9XDP";
//$dbname = "Tirbo";

// Create connection
$con=mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySql: " . mysqli_connect_error();
}


mysqli_query($con, "INSERT INTO Users (First_Name,Last_Name,Email,Password) VALUES('$firstName','$lastName','$email','$userpassword')") ;

header("Location: index.php");
$con->close(); 
?>
