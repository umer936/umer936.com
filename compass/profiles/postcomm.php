<center><font color=purple>
<meta name="viewport" content="width=device-width" />
<? 

include("../db.php");
$upper = ucfirst($_POST['status']);

$pass = hash(sha512, $_COOKIE['pass']);
 $user = $_COOKIE['user'];
$ip = $_SERVER['REMOTE_ADDR'];

 if ($_POST['status']=="") {header("location: /status/blank.php"); exit();}

 $q = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$user' AND password='$pass'"));
 if ($q=="1") {$true = "True";} 
else {$true = "Fake"; echo "Your call could not be completed as dialed, please <a href=/logout.php>logout</a> and login again<hr>";}

if($user=="") {header('Location: /index.php');} 

if ($true=="True") {$ins = mysql_query("INSERT INTO comments (user, comment, type, statid)
VALUES ('$user', '$upper', 'profile', '" . $_GET['id'] . "')"); 



if ($_GET['id']==$_COOKIE['user']) {echo "";} else {mysql_query("INSERT INTO notifications (user, notification)
VALUES ('" . $_GET['id'] . "', '<a href=/profiles/?user=$user>$user</a> commented on your profile')"); 
}

 $points = mysql_query("SELECT * FROM users WHERE username='$user'");

 while ($row = mysql_fetch_array($points))

 {$pts = $row['points'] + 2;

 mysql_query("UPDATE users SET points='$pts' WHERE username='$user'");}}

 if ($true=="True") {header("location: index.php?user=" . $_GET['id'] . "");}
 if ($_POST['status']=="/help") {header("location: help"); $cmd = "Y";}
 if ($_POST['status']=="") {header("location: blank.php"); $cmd = "Y";}

if (!$ins) {
    die('o-o');
}
 
?>