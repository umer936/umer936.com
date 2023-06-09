<? 
include("../db.php");

$user = $_COOKIE['user'];
$pass = hash(sha512, $_COOKIE['pass']);
$query1 = "SELECT rank FROM users WHERE username='$user' AND password='$pass'"; 
$result1 = mysql_query($query1); 
if($result1 == false) 
{ 
   user_error("Query failed: " . mysql_error() . "<br />\n$query1"); 
} 
elseif(mysql_num_rows($result1) == 0) 
{ 
   echo "<p>Sorry, no rows were returned by your query.</p>\n<meta http-equiv='REFRESH' content='0;url=/'>"; 
} 
else 
{ 
   while($query_row = mysql_fetch_assoc($result1)) 
   { 
      foreach($query_row as $key => $value) 
      { 
         echo "<center>Your $key is $value<br />\n"; 



      } 
      echo "\n"; 
   } 
}

if ($user=="") {header('Location: /');} else {echo "";}

if ($value=='<font color=red>Admin</font>')
 {echo "<hr width=50%><font color=red size=5>Admin Stuff</font><hr style='height: 2; border: 5px solid red;'>";}
elseif ($value=='<font color=green>Mod</font>')
  {echo "<hr width=50%><font color=green size=5>Mod Things</font><hr style='height: 2; border: 5px solid green;'>";}
else {echo "GETTOUT!!!!!!!!!!"; exit();}