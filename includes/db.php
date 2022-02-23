<?php

error_reporting(0);
ini_set('display_errors', '0');

// Connection Database

$dbuser="computo1";		 		//user to access your database
$dbpassword="123456"; 			//password to access your database
$dbname="money"; 	//name of database
$dbhost="Router";		//your database server
$port = "3307";
//Connect
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname,$port);
if (mysqli_connect_errno()) {
	printf("MySQLi connection failed: ", mysqli_connect_error());
	exit();
}

// Change character set to utf8
if (!$mysqli->set_charset('utf8')) {
	printf('Error loading character set utf8: %s\n', $mysqli->error);
}

?>
