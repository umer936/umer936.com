<? 

$result = mysql_query("SELECT * FROM mail WHERE UserTo='$user' AND Status='Unread'");
$num_rows = mysql_num_rows($result);
if ($num_rows>0) {
echo "<a href=/mail>$num_rows New Messages</a><hr>";
}
else {}

$queryf = mysql_query("SELECT * FROM `notifications` WHERE (`user` = '$user' OR `user` = 'everyone') AND `read` = 'no' ORDER BY `ID` DESC");

While ($row = mysql_fetch_array($queryf))
 {


$lastonline = strtotime($row['time']);
$now = TIME();

include 'time.php';


echo "" . $row['notification'] . " <a href=/delnotification.php?id=" . $row['ID'] . ">
<img src=http://bit.ly/qj4fVH width=10 hieght=10></a>
<br><font color=silver>$lastonline $Chronology Ago</font><hr width=90%>";}