<?php

include '../db.php';
include '../ckban.php';
include '../userrank.php'; 

$user = $_COOKIE['user']; 
$to = $_POST['email'];
$subject = $_POST['subject'];
$main = $_POST['message']; 
// $Bcc = "outmail@compass.netau.net";
$message = "
$main

Sent from 
Compass (http://compass.netau.net)!
In order to reply to this message, go to http://compass.netau.net, login, then click the 'Mail' link!";
$from = $_POST['from'];
$headers = "From:" . $from . "" . "\r\n" . 
"Bcc:" . $Bcc;
mail($to,$subject,$main,$headers);
echo "Mail Sent.";
?>