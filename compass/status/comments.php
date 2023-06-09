<? include 'input.php'; 
include '../ckban.php';
include('../db.php');
$place = "On Status";
 mysql_query("UPDATE users SET lastdoing='$place' WHERE username='" . $_COOKIE['user'] . "'");  
?><meta name="viewport" content="width=device-width" />
<link rel=stylesheet href="style.css" type="text/css">
<style>body{background-size:100%; background: url('http://www.efastcars.com/McLaren_F1_LM.jpg');}</style>
<? 
$user = $_COOKIE['user'];
$pass = hash(sha512, $_COOKIE['pass']);

$like = $_GET['like'];
if(isset($like)) {
$numrows = mysql_query("SELECT * FROM likes WHERE ID='" . $_GET['id'] . "' AND Name = '" . $_COOKIE['user'] . "'"); 
$num_rows = mysql_num_rows($numrows);

if($num_rows==0){
if($like=="no") {mysql_query("INSERT INTO likes (Type, Name, ID, Value)
VALUES ('Status', '" . $_COOKIE['user'] . "', '" . $_GET['id'] . "', -1)");
 header('Location: /status');} 
elseif($like=="yes") {mysql_query("INSERT INTO likes (Type, Name, ID, Value)
VALUES ('Status', '" . $_COOKIE['user'] . "', '" . $_GET['id'] . "', 1)"); 
header('Location: /status');} else {echo "";}}
 else {echo "<br>";}
} else {echo "";}  



$query1 = "SELECT rank FROM users WHERE username='$user' AND password='$pass'"; 
$result1 = mysql_query($query1); 
if($result1 == false) 
{ 
   user_error("Query failed: " . mysql_error() . "<br />\n$query1"); 
} 
elseif(mysql_num_rows($result1) == 0) 
{ 
   echo "<p>Sorry, no rows were returned by your query.</p>\n<meta http-equiv='REFRESH' content='0;url=/'>"; exit(); 
} 
else 
{ 
   while($query_row = mysql_fetch_assoc($result1)) 
   { 
      foreach($query_row as $key => $value) 
      { 

      } 
   } 
}


$resultegh81 = mysql_query("SELECT  `username` FROM  `status` WHERE  `id` = " . $_GET['commid'] . ""); 
if($resultegh81 == false) 
{ 
   user_error("Query failed: " . mysql_error() . "<br />\n$queryegh81"); 
} 
elseif(mysql_num_rows($resultegh81) == 0) 
{ 

   echo "<p>Sorry, this user does not exist in the DataBase.</p>\n"; 
} 
else 
{ 
   while($query_row = mysql_fetch_assoc($resultegh81)) 
   { 
      foreach($query_row as $keyegh8 => $valueegh8) 
      { 
         echo "\n"; 
      } 
      echo "\n"; 
   } 
}



$valueeegh8 = urlencode($valueegh8);

echo "
<form name=input action=postcomm.php?id=" . $_GET['commid'] . "&owner=$valueeegh8 method=post 
onsubmit=\"document.getElementById('Submit').value='Posting!'; document.getElementById('Submit').disabled=true;\">"; ?>
<input type="text" name="status" placeholder="Type Comment Here">
<input type="submit" value="Post" id="Submit" />
</form><hr>
<center>


<?
$queryf = mysql_query("SELECT * FROM status WHERE id=" . $_GET['commid'] . "");
While ($row = mysql_fetch_array($queryf))
 {


$query81 = "SELECT rank FROM users WHERE username='" . $row['username'] . "'"; 
$result81 = mysql_query($query81); 
if($result81 == false) 
{ 
   user_error("Query failed: " . mysql_error() . "<br />\n$query81"); 
} 
elseif(mysql_num_rows($result81) == 0) 
{ 

   echo "<p>Sorry, this user does not exist in the DataBase.</p>\n"; 
} 
else 
{ 
   while($query_row = mysql_fetch_assoc($result81)) 
   { 
      foreach($query_row as $key8 => $value8) 
      { 
         echo "\n"; 
      } 
      echo "\n"; 
   } 
}

$lastonline = strtotime($row['time']);
$now = TIME();


$numcomm = mysql_num_rows(mysql_query("SELECT * FROM comments WHERE statid='" . $row['id'] . "'"));
$numlikes = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE ID='" . $row['id'] . "' AND Value='1'"));
$numdis = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE ID='" . $row['id'] . "' AND Value='-1'"));
$total = $numlikes - $numdis;

include '../time.php';

$id = $row['id'];
echo "

<script type=text/javascript>
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>


<div id=status>
<div id=first><a href='/profiles/index.php?user=" . $row['username'] . "'>" . $row['username'] . "</a>            |         $value8
 <br><font color=silver>$lastonline $Chronology Ago</font></div><br/> " . $row['status'] . "<br><div id=last><b>ID: </b><font color=purple>" . $row['id'] . "</font>";


if ($value=='<font color=green>Mod</font>' || $value=='<font color=red>Admin</font>')


 {$close = " | <b>IP: </b><font color=purple>" . $row['ip'] . "</font><hr><a href=deletebyid.php?id=" . $row['id'] . ">DELETE</a>

";}


 else {$close = "";}
echo "

$close

<hr>
<a href=/status/?id=" . $row['id'] . "&like=yes><img src=https://ssl.gstatic.com/s2/oz/images/stars/po/SRP/p1on2.gif width=50></a> <font color=green size=5><br>
<a onclick=\"toggle_visibility('Likes" . $row['id'] . "');\">Likes: $numlikes</a></font><br>
<div id=Likes" . $row['id'] . " style='display: none;'>
<iframe src=dis-likes.php?id=$id&like=yes></iframe>
<br></div>
<a href=/status/?id=" . $row['id'] . "&like=no><img src=http://sandboxworld.com/wp-content/uploads/2011/07/google-minus-one.jpg width=50></a> <br>
<a onclick=\"toggle_visibility('DisLikes" . $row['id'] . "');\"><font color=red size=5>Dislikes: $numdis</font></a><br>
<div id=DisLikes" . $row['id'] . " style='display: none;'>
<iframe src=dis-likes.php?id=$id&like=no></iframe>
<br></div>

</div></div><hr>
";} 





$commid=$_GET['commid'];
$queryef = mysql_query("SELECT * FROM comments WHERE statid=$commid ORDER BY id DESC");
While ($reow = mysql_fetch_array($queryef))
 {
$lastonline = strtotime($reow['time']);
$now = TIME();

$querye81 = "SELECT rank FROM users WHERE username='" . $reow['user'] . "'"; 
$resulte81 = mysql_query($querye81); 
if($resulte81 == false) 
{ 
   user_error("Query failed: " . mysql_error() . "<br />\n$querye81"); 
} 
elseif(mysql_num_rows($resulte81) == 0) 
{ 

   echo "<p>Sorry, this user does not exist in the DataBase.</p>\n"; 
} 
else 
{ 
   while($query_row = mysql_fetch_assoc($resulte81)) 
   { 
      foreach($query_row as $keye8 => $valuee8) 
      { 
         echo "\n"; 
      } 
      echo "\n"; 
   } 
}


include '../time.php';

$id = $reow['id'];
echo "


<div id=status>
<div id=first><a href='/profiles/index.php?user=" . $reow['user'] . "' target='_parent'>" . $reow['user'] . "</a>            |         $valuee8
 <br/><font color=grey>" . $reow['time'] . "</font><br><font color=silver>$lastonline $Chronology Ago</font></div><br/> " . $reow['comment'] . "<br><div id=last><b>ID: </b>
<font color=purple>" . $reow['id'] . "</font>


$close

</div></div>";
} 
echo "<a href='' target='_parent' style='position:absolute;
right:10px; display:none;
top:15px;'>Full Screen</a>
<a href='javascript:history.go(-1)' style='position:absolute;
right:10px;display:none;
top:35px;'>Back</a>";

?>