<? include '../db.php';
include 'check.php';
$ip = $_SERVER['REMOTE_ADDR']; 

if (!$_POST["user"] || !$_POST["reason"] || !$_POST["EndTime"]) {echo "one or more fields not filled";}
else {
echo $_POST["user"]; echo "<br>";
echo $_POST["reason"]; echo "<br>One ";
echo $_POST["EndTime"]; echo "<br>";

$user = $_POST["user"];
$reason = $_POST["reason"];
if ($_POST["EndTime"]=="Year") {$endtime = date('Y-m-d', strtotime('+1 year'));}
elseif ($_POST["EndTime"]=="Month") {$endtime = date('Y-m-d', strtotime('+1 month'));} 
elseif ($_POST["EndTime"]=="Week") {$endtime = date('Y-m-d', strtotime('+1 week'));}
elseif ($_POST["EndTime"]=="Day") {$endtime = date('Y-m-d', strtotime('+1 day'));}
else {die('opps');}
echo "$endtime";

include '../db.php';
mysql_query("INSERT INTO `bans` (`user`, `endtime`, `reason`, `by`,  `IP`)
VALUES ('$user', '$endtime', '$reason', '" . $_COOKIE['user'] . "', '$ip')");




}
 ?>