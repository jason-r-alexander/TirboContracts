<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['Email']) || empty($_POST['userpassword'])) {
$error = "Email or Password is invalid";
}
else
{
// Define $Email and $userpassword
$Email=$_POST['Email'];
$userpassword=$_POST['userpassword'];
// Establishing Connection with Server by passing server_name, user_id and userpassword as a parameter
$connection = mysql_connect("tirbocontracts.scb.rit.edu", "admin", "4zBqmLt4uSxB9XDP");
// To protect MySQL injection for Security purpose
$Email = stripslashes($Email);
$userpassword = stripslashes($userpassword);
$Email = mysql_real_escape_string($Email);
$userpassword = mysql_real_escape_string($userpassword);
// Selecting Database
$db = mysql_select_db("Tirbo", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("SELECT * FROM Users WHERE Password='$userpassword' AND Email='$Email'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$Email; // Initializing Session
header("location: dashboard.php"); // Redirecting To Other Page
} else {
$error = "Email or password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>