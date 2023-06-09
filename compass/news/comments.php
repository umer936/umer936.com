<?
include '../db.php';
$commid=$_GET['id'];
echo "<form name=input action='postcomm.php?id=article$commid' method=post onsubmit=\"document.getElementById('Submit').value='Posting!'; document.getElementById('Submit').disabled=true;\">
<input type=text name=status placeholder='Type Comment Here' class='idleField'>
<input type='submit' value='Post' id='Submit'>
</form><hr>";
$queryef = mysql_query("SELECT * FROM `comments` WHERE `statid`='article$commid' ORDER BY id DESC");
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


<div id=comment>
<div id=first><a href='/profiles/index.php?user=" . $reow['user'] . "' target='_parent'>" . $reow['user'] . "</a>            |         $valuee8
 <br><font color=silver>$lastonline $Chronology Ago</font></div><br/> " . $reow['comment'] . "<br><div id=last><b>ID: </b>
<font color=purple>" . $reow['id'] . "</font>
";


if ($valuee8=='<font color=green>Mod</font>' || $valuee8=='<font color=red>Admin</font>' || $user==$_COOKIE['user'])


 {$close = "<hr width=50%><a href=deletebyid.php?id=" . $reow['id'] . ">DELETE</a>

";}


 else {$close = "";}
echo "

$close <hr>

</div></div>";}
