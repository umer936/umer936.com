<?php
include 'db.php';
$result = mysql_query("SELECT password FROM users WHERE username='" . $_POST['username'] . "'");
$md5 = md5($_POST['password']);
if(!$result)
{
echo "oops! The Username you entered does not exist";
}
else
if($md5!= mysql_result($result, 0))
{
echo "You entered an incorrect password";
}
else if($_POST['newpass']!=$_POST['confirmnewpasssword'])
{
echo "The new password and confirm new password fields must be the same";
}
else
$sql=mysql_query("UPDATE users SET password='" . $_POST['newpass'] . "' WHERE username='" . $_POST['username'] . "'");
if($sql)
{
echo "Congratulations You have successfully changed your password";
}
?>