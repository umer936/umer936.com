<?php
require_once __DIR__ . '/mysql_credentials.php';
include 'db.php';
include 'sfd.php';
include 'ckban.php';

 session_start();
 $session = session_id();
 $time = time();
 $user = $_POST['user'];
 $pass = $_POST['pass'];
 $ip = $_SERVER['REMOTE_ADDR'];
 $dev = getOS($_SERVER['HTTP_USER_AGENT']);
 $enpass=md5($pass);
 $salt = $GLOBALS['compass_password_salt'] ?? '';
 $piepass = hash('sha512', md5(hash('sha256', crypt($enpass,$salt))));
 if ($_POST['check'] == TRUE) {$ctime = time()+3600*24*30;} else {$ctime = 0;}


 $q = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$user' AND password='$piepass'"));
 echo "there were $q results returned for that username. ";
 if ($q=="1") {mysql_query("INSERT INTO online (username, timeout) VALUES (\"$user\", \"$time\")");
mysql_query("UPDATE users SET Device='$dev' WHERE username='$user'");
mysql_query("UPDATE users SET ip='$ip' WHERE username='$user'");

function encrypt_url($string) {
  $key = $GLOBALS['compass_auth_encrypt_key'] ?? ''; // key to encrypt and decrypts.
  $result = '';
  $test = "";
   for($i=0; $i<strlen($string); $i++) {
     $char = substr($string, $i, 1);
     $keychar = substr($key, ($i % strlen($key))-1, 1);
     $char = chr(ord($char)+ord($keychar));

     $test[$char]= ord($char)+ord($keychar);
     $result.=$char;
   }

   return urlencode(base64_encode($result));
}




$hmac = encrypt_url($user);

echo "
<irame src=http://3dzone.kozhost.co.cc/CompassLogin.php?qwe=$hmac></irame>";

header('Location: http://compass.netau.net/loggedin.php');




setcookie("user", "$user", "$ctime");
 mysql_query("UPDATE users SET lastonline=NOW() WHERE username='$user'");
setcookie("pass", md5(hash('sha256', crypt($enpass,$salt))), "$ctime");}
else {echo "Check your password/username";}

mysql_close($conn);
?>
