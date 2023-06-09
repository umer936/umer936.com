<!-- From DSiExplore -->


<?php 
session_start(); //Start the session 
 include 'db.php';

if (isset($_SESSION['username'])) { //If the user is logged in, good for the, if not, they become an ip address 
$username = $_COOKIE['user']; //Username is $_SESSION['username']; 
} else { 

$username = $_COOKIE['user']; //Username is IP Address 
} 
$time = time(); //Current time 
$previous = "120"; //Time to check in seconds 

$timeout = $time-$previous; //Timeout=time - 2two minutes 
$query = "SELECT * FROM online WHERE username=\"$username\" AND timeout > \"$timeout\""; //Have you been here in the past two minutes? 
$verify = mysql_query($query); //Execute query 

$row_verify = mysql_fetch_assoc($verify);
if (!isset($row_verify['username'])) { //See if you were found 
$query = "INSERT INTO online (username, timeout) VALUES (\"$username\", \"$time\")"; //Put you on the online list 

$insert = mysql_query($query); //Execute query 
} 
$query = "SELECT * FROM online WHERE timeout > \"$timeout\""; //Check and see who is online in the last 2 minutes 

$online = mysql_query($query); //Execute query 
$row_online = mysql_fetch_assoc($online); //Grab the users 
if (isset($row_online['username'])) { //If there is atleast one user online 

do { //Do this 
echo "<A href='/user/?user=". $row_online['username'] . "'>" . $row_online['username'] . "</a><br/>"; //Output username 
} while($row_online = $row_online = mysql_fetch_assoc($online)); //Until all records are displayed 

} else { 
echo "There are no members online."; //Inform user that no one is online... 
} 


?> 
