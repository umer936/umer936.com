<?php
$error = "Things are broken";
$mysql_host = "localhost";
$mysql_database = "umer936x_PasswordReqs";
$mysql_user = "umer936x_umer";
$mysql_password = "salman123";
$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);

if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

$database_name = "WebsiteReqs";
?>