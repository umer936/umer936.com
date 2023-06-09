<?php

$user = $_COOKIE['user'];
$pass = md5($_COOKIE['pass']);
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
         echo "hi"; 



      } 
      echo "\n"; 
   } 
}

if ($user=="") {header('Location: /');} else {echo "";}




 if (isset($_COOKIE['user']))
 {$user = $_COOKIE['user'];
 header("location: /profiles/?user=" . $_COOKIE['user'] . "");
 Echo "<a href=edit>Edit profile</a><hr/>";
 include("../../db.php");
 $bio = $_POST['Bio'];
 $icon = $_POST['Avatar'];
 $css = $_POST['CSS'];
 $sig = $_POST['Sig'];
Mysql_query("UPDATE users SET Bio='$bio' WHERE username='$user'");
Mysql_query("UPDATE users SET CSS='$css' WHERE username='$user'");
mysql_query("UPDATE users SET Avatar='$icon' WHERE username='$user'");
Mysql_query("UPDATE users SET Sig='$sig' WHERE username='$user'");

 mysql_close($conn);}

 else {echo "Please login...";}

 ?>