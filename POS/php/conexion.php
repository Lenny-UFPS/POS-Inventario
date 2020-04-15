<?php session_start(); 

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "pos_inventario_db";

// Create connection
$mysqli = new mysqli($serverName, $username, $password, $dbName);

// Check connection
if($mysqli->connect_error){
	die("Connection failed: " . $mysqli->connect_error);
}

?>