<?

include '../ckban.php';
include '../db.php';

$id = $_GET[id];
$type = $_GET[type];
$user = $_COOKIE[user];

$numrows = mysql_query("SELECT * FROM notifications 
WHERE user =  '$id' AND notification =  '<a href=/profiles/?user=$user>$user</a> $type you'"); 

$num_rows = mysql_num_rows($numrows);

if($num_rows<=3){
mysql_query("INSERT INTO `notifications` (
`user` ,
`notification`
)
VALUES (
'$id', '<a href=/profiles/?user=$user>$user</a> $type you'
);");}

?>