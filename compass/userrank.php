<?
include 'db.php';
include 'ckban.php';

if($_COOKIE[user]=="")
{header('Location: /');
exit();}

else {
$user = $_COOKIE['user'];
$pass = hash(sha512, $_COOKIE['pass']);
$query1 = "SELECT rank FROM users WHERE username='$user' AND password='$pass'"; 
$result1 = mysql_query($query1); 
if($result1 == false) 
{ 
   user_error("Query failed: " . mysql_error() . "<br />\n$query1"); 
} 
elseif(mysql_num_rows($result1) == 0) 
{echo "<p>Sorry, you need to login.</p><meta http-equiv='REFRESH' content='0;url=/'>"; exit();} 
else 
{ 
   while($query_row = mysql_fetch_assoc($result1)) 
   { 
      foreach($query_row as $key => $value) 
      { 
         echo ""; 
      } 
      echo ""; 
   } 
}}