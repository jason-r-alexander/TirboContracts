<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("tirbocontracts.scb.rit.edu", "admin", "4zBqmLt4uSxB9XDP");
// Selecting Database
$db = mysql_select_db("Tirbo", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("SELECT Email FROM Users WHERE Email='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['Email'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>