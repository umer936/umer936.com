<?
include 'db.php';
$newpass = md5($_POST[pass]);
if ($_POST[pass]=="") {echo "You didn't enter a New Password!";}
else {
mysql_query("UPDATE users SET password='$newpass' WHERE username='$_COOKIE[user]'"); 
header('Location: /');}

?>