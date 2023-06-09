<font size=3><script>document.body.scrollTop = 176;</script>
<meta name="viewport" content="width=device-width">
<script src=bottom.js></script>
<script src="http://github.com/rafaelp/css_browser_selector/raw/master/css_browser_selector.js" type="text/javascript"></script>
<script type="text/javascript" src="../pc/js/jquery-1.3.2.min.js"></script>
<center>
<?
include '../ckban.php';
include('../db.php');
if ($_GET['user']==$_COOKIE['user']) {$ifpro = "<font color=grey>My Profile</font>";}
 elseif ($_GET['user']!=$_COOKIE['user'])
 {$ifpro = "<a href='/profiles/index.php?user=" . $_COOKIE['user'] . "'>My Profile</a>";}
 if ($_GET['user']) {echo "<div id=top><center><a href=edit>Edit profile</a> | $ifpro | <a href=/>Home</a></center></div><br/>";
}

 $user = $_GET['user'];
 $username = $_COOKIE['user'];
 $number = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$user'"));

$place = "Viewing the profile of $user";
include('../update.php');
$pass = hash(sha512, $_COOKIE['pass']);
$query1 = "SELECT rank FROM users WHERE username='$username' AND password='$pass'"; 
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
         echo ""; 



      } 
      echo "\n"; 
   } 
}




 if ($number=="0") {echo "No user with a username of <b>$user</b> exists on this website.<br />
<a href=/search>Search for a User?</a><br>
<a href=/>Go To Home Page?</a>";}
elseif (!$user)
  {
 die("No user profile selected...<br><a href=/><br><br>Go To Home Page?</a>");}
 else   
{

 $q = mysql_query("SELECT * FROM users WHERE username='$user'");
 While ($row = mysql_fetch_array($q))
{

 $css2 = $row['CSS'];
 echo "<head><style>";
 Echo "#top {border: 2px groove red; width: 50%;}
 #content{width:220px;border:4px groove #000000; background-color: #eeefff; font-family: Simonetta;}
 body { color: " . $row['font'] . "}";
 echo "$css2</style></head><center><div id=content><center>";

 $points = round($row['points']);
 $ico2 = $row['Avatar'];
 $ran = $row['rank'];
 $sig = $row['Sig'];

 $numberlikes = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE Name='$user' AND Value='1'"));
 $numberdislikes = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE Name='$user' AND Value='-1'"));
 $numberstatuses = mysql_num_rows(mysql_query("SELECT * FROM status WHERE username='$user'"));
 $numbercomments = mysql_num_rows(mysql_query("SELECT * FROM comments WHERE user='$user'"));
 $numberprocomm = mysql_num_rows(mysql_query("SELECT * FROM comments WHERE statid='$user'"));

 $limitstat = mysql_query("SELECT * FROM status WHERE username='$user' ORDER BY id DESC LIMIT 0, 1");

while ($statussc = mysql_fetch_array($limitstat)) {$st = $statussc['status'];}
 $row['Bio'] = str_ireplace("+mystatus", $st, $row['Bio']);

 if ($sig=="") {$sig = "{<del>None</del>}";} else {$sig = "<font color=blue>\"" . $row['Sig'] . "\"</font>";}
 if ($ran=="") {$rank = "<title>$user's Profile</title><del>Normal</del><br/>";}
$capsuser = ucfirst($user);
If ($ran=="<font color=red>Admin</font>") {
$rank = "<title>Admin - $capsuser</title><font color=red>Administrator</font><br/>";
}

Elseif ($row['rank']=="<font color=green>Mod</font>") {$rank = "<title>Mod - $capsuser</title><font color=green>Moderator</font>";}
Elseif ($row['rank']=="") {$rank = "<title>$capsuser's Profile</title><font color=blue>User</font>";}
Else {$rank = "" . $row['rank'] . "<br>";}


 if($row['date']=="0000-00-00 00:00:00") {$joined = "Before Release";} else {$joined = $row['date'];}

 if ($ico2=="") {$icon = "/images/none.png";}
 else
 {$icon = $row['Avatar'];}

$lastonline = strtotime($row['lastonline']);
$now = TIME();


include '../time.php';




$numlikes = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE ID='$user' AND Value='1'"));
$numdis = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE ID='$user' AND Value='-1'"));
$total = $numlikes - $numdis;











include '../db.php';
$vceckp = mysql_query("SELECT * FROM users WHERE username='$_GET[user]'");
$time=time()-'300';
$checkon="SELECT * FROM online WHERE username='$_GET[user]' AND timeout>".$time."";
$onoff=mysql_query($checkon);

mysql_fetch_array($vceckp) or die ("User does not exist");

$online=mysql_fetch_assoc($onoff);
if(!isset($online['username'])){
$hi="Offline2";
}else{
$hi="Online1";
}
















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




<br><img src='$icon' width=60 height=60><br/><img src=/images/$hi.png height=25 width=85>



<br><a href=/mail/send/?to=$user><img src=http://bit.ly/pXL8LF height=20></a>

<a href=\"javascript:ajaxpage('punch-tap.php?id=" . $_GET[user] . "&type=punched', 'contentarea');
ajaxpage('loading.php', 'punch')\">
<span id=punch><img src=http://bit.ly/r9lQiH height=20></span></a>


<a href=\"javascript:ajaxpage('punch-tap.php?id=" . $_GET[user] . "&type=tapped', 'contentarea');
ajaxpage('loading.php', 'Tap')\">
<span id=Tap><img src=Tap.png height=20></span></a>


<a href=\"javascript:ajaxpage('friending.php?id=" . $_GET[user] . "', 'contentarea');
ajaxpage('loading.php', 'friend')\">
<span id=friend><img src=Friend%20Icon.PNG height=20></span></a>


<br/>User: <b>$user</b><br/>$sig<br/>Compass Points: <font color=purple>$points</font>
 <br/>Rank: $rank Joined:<font color=13efed> $joined</font><br>Last Online: <br><font color=green>$lastonline $Chronology Ago - " . $row['lastdoing'] . "</font><br></div><br />";

 Echo "<br/><div id=content><b>Bio:</b><br/><hr><br/>" . $row['Bio'] . "</div><br><br>
<div id=content>

<b>Likes</b><hr>
<a href=\"javascript:ajaxpage('/setlikes.php?id=$user&like=yes&type=Profile', 'contentarea');\"><img src=/images/+1.png width=50></a> <font color=green size=5><br>
<a onclick=\"toggle_visibility('Likes$user');\">Likes: $numlikes</a></font><br>
<div id='Likes$user' style='display: none;'>
<iframe src='dis-likes.php?id=$user&like=yes' width=100%></iframe>
<br></div>
<a href=\"javascript:ajaxpage('/setlikes.php?id=$user&like=no&type=Profile', 'contentarea');\"><img src=/status/-1.png width=50></a> <br>
<a onclick=\"toggle_visibility('DisLikes$user');\"><font color=red size=5>Dislikes: $numdis</font></a><br>
<div id='DisLikes$user' style='display: none;'>
<iframe src='dis-likes.php?id=$id&like=no' width=100%></iframe>
<br></div>
<font color=purple size=5>Total: $total</font>



 </div><br><br>
<div id=content><b>User Stats</b><hr>
Number of likes: $numberlikes<br>
Number of dislikes: $numberdislikes<br>
Number of statuses: $numberstatuses<br>
Number of comments: $numbercomments<br>
Number of profile comments: $numberprocomm<br>

</div>
"; 

if ($value=='<font color=green>Mod</font>' || $value=='<font color=red>Admin</font>')


 {echo "<br><br><div id=content><b>Mod Stuff</b><hr>
<b>ID: </b>
<font color=fushia>" . $row['id'] . "</font><br>
<b>IP: </b><font color=purple>" . $row['ip'] . "</font><br>
<b>Using:</b><font color=blue> " . $row['Device'] . "</font><br></div>
<br><br><div id=content><b>Alt Accounts</b><hr>";
include 'alts.php';
echo "</div>";}

echo "
<br><br>

<div id=content>

<a href=\"javascript:ajaxpage('comments.php?user=" . $_GET[user] . "', 'contentarea');\">Comments</a>
<a href=\"javascript:ajaxpage('friends.php?user=" . $_GET[user] . "', 'contentarea');\">Friends</a>
<hr>
<div id=contentarea>";
include 'comments.php';
echo "</div></div>";

}    
} 


  ?>