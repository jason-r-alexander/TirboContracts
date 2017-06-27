 
<?php

//Credentials 

$servername = "tirbocontracts.scb.rit.edu"; 
$username = "admin";
$password = "4zBqmLt4uSxB9XDP";
$dbname = "Tirbo"; 

//connection to the database
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
	echo "Faield to connect to MySql: " . mysqli_connect_errno(); 
}
?> 


