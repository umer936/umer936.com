<center><font color=purple>
<meta name="viewport" content="width=device-width" />
<? 

include("../db.php");
$upper = ucfirst($_POST['status']);

$pass = hash(sha512, $_COOKIE['pass']);
 $user = $_COOKIE['user'];
$ip = $_SERVER['REMOTE_ADDR'];

 $q = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$user' AND password='$pass'"));
 if ($q=="1") {$true = "True";} 
else {$true = "Fake"; echo "Your call could not be completed as dialed, please <a href=/logout.php>logout</a> and login again<hr>";}

if($user=="") {header('Location: /index.php');} 

if ($true=="True") {$ins = mysql_query("INSERT INTO comments (user, comment, type, statid)
VALUES ('$user', '$upper', 'status', '" . $_GET['id'] . "')"); 

$owner = $_GET['owner'];
if ($owner==$_COOKIE['user']) {echo "";} else {
mysql_query("INSERT INTO notifications (user, notification) VALUES ('$owner', 
'<a href=/profiles/?user=$user>$user</a> commented on your <a href=/status/comments.php?commid=" . $_GET['id'] . ">status</a>')");}

 $points = mysql_query("SELECT * FROM users WHERE username='$user'");

 while ($row = mysql_fetch_array($points))

 {$pts = $row['points'] + 2;

 mysql_query("UPDATE users SET points='$pts' WHERE username='$user'");}}

 if ($true=="True") {header("location: comments.php?commid=" . $_GET['id'] . "");}
 if ($_POST['status']=="/help") {header("location: help"); exit();}
 if ($_POST['status']=="") {header("location: blank.php"); exit();}

if (!$ins) {
    die('o-o');
}
 
?>