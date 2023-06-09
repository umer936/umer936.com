<center><font color=purple>
<? 

include("../db.php");
$upper = ucfirst($_POST['status']);

$pass = hash(sha512, $_COOKIE['pass']);
 $user = $_COOKIE['user'];
$ip = $_SERVER['REMOTE_ADDR'];


 if ($_POST['status']=="/help") {header("location: help"); exit();}
 if ($_POST['status']=="") {header("location: blank.php"); exit();}


 $q = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$user' AND password='$pass'"));
 if ($q=="1") {$true = "True";} 
else {$true = "Fake"; echo "Your call could not be completed as dialed, please <a href=/logout.php>logout</a> and login again<hr>";}

if($user=="") {header('Location: /index.php');} 

if ($true=="True") {$ins = mysql_query("INSERT INTO status (username, status, ip)
VALUES ('$user', '$upper', '$ip')"); 
 $points = mysql_query("SELECT * FROM users WHERE username='$user'");

 while ($row = mysql_fetch_array($points))

 {$pts = $row['points'] + 4;

 mysql_query("UPDATE users SET points='$pts' WHERE username='$user'");}}

 if ($true=="True") {header('Location: index.php');}


if (!$ins) {
    die('o-o');
}
 
?>