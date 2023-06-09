<a href=http://compass.netau.net>Home</a><br/><br/><head>
<title>Mail</title></head>
<?php

include '../db.php';
include '../ckban.php';
include '../userrank.php'; 
 
 echo "<a href=outbox.php>Outbox</a>  |  <a href='send'>New Message</a> | <a href=emailform.php>
<font color=red>NEW!</font> SEND REAL EMAIL!!!</a>";
 $username = $_COOKIE['user'];

 If (!$_GET['page']) {$page = "0";} else {$page = $_GET['page'];}

 mysql_query("UPDATE mail SET Status='Read' WHERE UserTo='$username'"); 

 $query = mysql_query("SELECT * FROM mail WHERE UserTo='$username' ORDER BY id DESC LIMIT $page, 10");
 echo "$page1 | $page2 <hr>";
 while ($row = mysql_fetch_array($query))
 {
 $from = $row['UserFrom'];
 $sub = $row['Subject'];
 $time = $row['SentDate'];
 $body = $row['Message'];
 $body2 = nl2br(wordwrap($body, 70, "<br/>"));
 if ($sub=="" || $sub==" ") {$sub = "None";} else {$sub = $sub;}
 $id = $row['id'];
 $lastonline = strtotime($row['SentDate']);
 $now = TIME();
 include '../time.php';

 echo "<hr/>


<div>
 <a href='/profiles/?user=$from'>$from</a> sent you a message
 $lastonline $Chronology Ago
 <br/>Subject: <b>$sub</b><b>
<pre>$body2<br/></pre></b>";
 echo "[<a href='send?to=" . $row['UserFrom'] . "&sub=RE:$sub'>Reply</a>]</div>";}
 ?>