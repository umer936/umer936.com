<?

include 'db.php';


$like = $_GET['like'];
$type = $_GET['type'];

if(isset($like)) {
$numrows = mysql_query("SELECT * FROM likes WHERE ID='" . $_GET['id'] . "' AND Name = '" . $_COOKIE['user'] . "'"); 
$num_rows = mysql_num_rows($numrows);

if($num_rows==0){
if($like=="no") {mysql_query("INSERT INTO likes (Type, Name, ID, Value)
VALUES ('$type', '" . $_COOKIE['user'] . "', '" . $_GET['id'] . "', -1)");} 
elseif($like=="yes") {mysql_query("INSERT INTO likes (Type, Name, ID, Value)
VALUES ('$type', '" . $_COOKIE['user'] . "', '" . $_GET['id'] . "', 1)");} else {}} else {}} else {}