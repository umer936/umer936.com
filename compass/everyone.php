<!-- From DSiExplore -->

<div style='display:none'>
<?php
session_start(); #Start the session
require_once __DIR__ . '/mysql_credentials.php';

$con = mysql_connect($compass_online_mysql_host, $compass_online_mysql_user, $compass_online_mysql_password);
mysql_select_db($compass_online_mysql_database, $con);

if (isset($_SESSION['username'])) { #If the user is logged in, good for the, if not, they become an ip address
$username = $_COOKIE['user']; #Username is $_SESSION['username'];
$color = $_COOKIE['color']; #bgcolor rename
} else {

$username = $_COOKIE['user']; #Username is IP Address
}
$time = time(); #Current time
$previous = "120"; #Time to check in seconds

$timeout = $time-$previous; #Timeout=time - 2two minutes
$query = "SELECT * FROM online WHERE username=\"$username\" AND timeout > \"$timeout\""; #Have you been here in the past two minutes?
$verify = mysql_query($query); #Execute query

$row_verify = mysql_fetch_assoc($verify); #Check if you have been here in two minutes
if (!isset($row_verify['username'])) { #See if you were found
$query = "INSERT INTO online (username, timeout) VALUES (\"$username\", \"$time\")"; #Put you on the online list

$insert = mysql_query($query); #Execute query
}
$query = "SELECT * FROM online WHERE timeout > \"$timeout\""; #Check and see who is online in the last 2 minutes

$online = mysql_query($query); #Execute query
$row_online = mysql_fetch_assoc($online); #Grab the users
if (isset($row_online['username'])) { #If there is atleast one user online

do { #Do this
echo $row_online['username']."<br/>"; #Output username
} while($row_online = mysql_fetch_assoc($online)); #Until all records are displayed

} else {
echo "There are no members online."; #Inform user that no one is online
}


?>
</div>
  <meta name="viewport"content="width=240">
<font size="1">

</div><br><br>
<center>
<div id="content">
<center>
<title>
Compass - All Users
</title>
<u>All Users Registered On Compass</u>
<br/>
<a href='index.php'>Back</a> :: <a href='/default.php'>Home</a><br/><br/>
<?php
$ip = $_SERVER['REMOTE_ADDR'];
?>
<?php
$conn = mysql_connect($compass_online_mysql_host, $compass_online_mysql_user, $compass_online_mysql_password);
mysql_select_db($compass_online_mysql_database, $conn);
$numpages = mysql_num_rows(mysql_query("SELECT * FROM users")) / 10;
echo "Total Users: " . mysql_num_rows(mysql_query("SELECT * FROM users")) . "<br/><br/>";

   $query = mysql_query("SELECT * FROM users");
 while ($row = mysql_fetch_array($query)){
 Echo "<div id='user'><a href='/profile/profile.php?id=" . $row['username'] . "'>" . $row['username'] . "</a>";
if ($ip=="72.219.7.202")
{echo " | <a href='delete-index2.php?delete=" . $row['username'] . "&pass=" . $row['password'] . "'>
Delete User</a> |  </div><hr>";}

else {echo "</div><hr>";}}
mysql_close($conn);
?>
<a href='#'>Top</a>
