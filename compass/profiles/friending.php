<?

include '../ckban.php';
include '../db.php';

$numrows = mysql_query("SELECT * 
FROM friends
WHERE  `Request` =  '" . $_GET[id] . "'
AND  `From` =  '" . $_COOKIE[user] . "'"); 
$num_rows = mysql_num_rows($numrows);

if($num_rows==0){
mysql_query("INSERT INTO `friends` (
`Request` ,
`From` ,
`Time`
)
VALUES (
'$_GET[id]',  '$_COOKIE[user]', 
CURRENT_TIMESTAMP
);");}
else {}

?>
<script>javascript:ajaxpage('comments.php?user=" . $_GET[id] . "', 'contentarea');</script>