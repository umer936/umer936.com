<?
include '../db.php';
mysql_query("DELETE FROM likes
WHERE Name='" . $_COOKIE['user'] . "' AND ID='" . $_GET['id'] . "'");

echo "You have unLiked/unDisLiked this status<br>Refresh to see changes";