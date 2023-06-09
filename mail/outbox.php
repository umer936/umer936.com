<br/><br/><head><meta name=viewport content=width=device-width>
<meta name=viewport content=width=240><title>Mail</title></head>


<?php

include '../db.php'; 
include '../ckban.php'; 
include '../userrank.php'; 
 
 if (isset($_COOKIE['user'])) 

 {echo "
<a href='/mail'>Inbox</a>";
 $username = $_COOKIE['user'];
 $query = mysql_query("SELECT * FROM mail WHERE UserFrom='$username' ORDER BY id DESC");

 while ($row = mysql_fetch_array($query))
 {
 $to = $row['UserTo'];
 $sub = $row['Subject']; 
 $body = nl2br($row['Message']);
 $body2 = wordwrap($body, 70, "<br/>");
 $lastonline = strtotime($row['SentDate']);
 $now = TIME();
 include '../time.php';

 if ($sub=="" || $sub==" ") {$sub = "None";}
else {$sub = $sub;}
 $id = $row['id'];

 echo "<hr/><div>
[To: <a href='/profiles/?user=$to'>$to</a> $lastonline $Chronology Ago]
<br/>Subject: <b>$sub</b><br/>[said:]<br/><b>$body2</b><br/></div>";}}

 else
 {Echo "<a href=http://compass.netau.net>Login.</a>";}

 ?>
