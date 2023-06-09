<center>
<font color=red size=5>Online Users</font><hr>
<? include('../db.php');
$username = $_COOKIE['user']; //Username is IP Address 
$time = time(); //Current time 
$previous = "120"; //Time to check in seconds 
$timeout = $time-$previous; //Timeout=time - 2two minutes 
$query = "SELECT * FROM online WHERE timeout > \"$timeout\""; //Check and see who is online in the last 2 minutes 
$online = mysql_query($query); //Execute query 
$row_online = mysql_fetch_assoc($online); //Grab the users 
if (isset($row_online['username'])) { //If there is atleast one user online 
do { //Do this 
$query1 = "SELECT Avatar FROM users WHERE username='" . $row_online['username'] . "'"; 
$result1 = mysql_query($query1); 
if($result1 == false) 
{ 
   user_error("Query failed: " . mysql_error() . "<br />\n$query1"); 
} 
elseif(mysql_num_rows($result1) == 0) 
{ 
   echo "<p>Sorry, no rows were returned by your query.</p>\n"; 
} 
else 
{ 
   while($query_row = mysql_fetch_assoc($result1)) 
   { 
      foreach($query_row as $key => $avi) 
      { 
         echo ""; 

      } 
      echo "\n"; 
   } 
}
$query12 = "SELECT lastdoing FROM users WHERE username='" . $row_online['username'] . "'"; 
$result12 = mysql_query($query12); 
if($result12 == false) 
{ 
   user_error("Query failed: " . mysql_error() . "<br />\n$query12"); 
} 
elseif(mysql_num_rows($result12) == 0) 
{ 
   echo "<p>Sorry, no rows were returned by your query.</p>\n"; 
} 
else 
{ 
   while($query_row = mysql_fetch_assoc($result12)) 
   { 
      foreach($query_row as $key2 => $doing) 
      { 
         echo ""; 

      } 
      echo "\n"; 
   } 
}
echo "<img src=$avi width=100><br><font color=silver>$doing</font><br>
<A href='/profiles/?user=". $row_online['username'] . "'>" . $row_online['username'] . "</a><br/><br>
<hr>"; //Output username 
} while($row_online = $row_online = mysql_fetch_assoc($online)); //Until all records are displayed 

} else { 
echo "There are no members online."; //Inform user that no one is online... 
} 


?> 
</center>