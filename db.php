<?php

$hostname = "tirbocontracts.scb.rit.edu";
$user = "admin";
$password = "4zBqmLt4uSxB9XDP";
$database = "Tirbo";

$bd = mysql_connect($hostname, $user, $password) 
or die("DB Connection Failed!");

mysql_select_db($database, $bd) or die("DB Connection Failed!");

?>