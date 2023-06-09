<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet/less" type="text/css" href="styles.less">
<a href=feedlikestatus.php style="float:right;">Check out the NEW version of status!</a>
<script src=AJAX.js></script>
<? flush();
include '../ckban.php'; include 'input.php'; ?><meta name="viewport" content="width=device-width" />
<body background=http://www.jpgwallpaper.com/image_cache/178_preview.png>

<script type=text/javascript src=http://w3schools.com/jquery/jquery.js></script>
<script>function activatePlaceholders() {
var detect = navigator.userAgent.toLowerCase(); 
if (detect.indexOf("safari") > 0) return false;
var inputs = document.getElementsByTagName("input");
for (var i=0;i<inputs.length;i++) {
  if (inputs[i].getAttribute("type") == "text") {
   if (inputs[i].getAttribute("placeholder") && inputs[i].getAttribute("placeholder").length > 0) {
    inputs[i].value = inputs[i].getAttribute("placeholder");
    inputs[i].onclick = function() {
     if (this.value == this.getAttribute("placeholder")) {
      this.value = "";
     }
     return false;
    }
    inputs[i].onblur = function() {
     if (this.value.length < 1) {
      this.value = this.getAttribute("placeholder");
     }
    }
   }
  }
}
}
window.onload=function() {
activatePlaceholders();
}
</script>



<? include('../db.php');
$place = "On Status";
 mysql_query("UPDATE users SET lastdoing='$place' WHERE username='" . $_COOKIE['user'] . "'");  
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
   echo "<p>Sorry, no rows were returned by your query.</p>\n<meta http-equiv='REFRESH' content='0;url=/'>"; exit(); 
} 
else 
{ 
   while($query_row = mysql_fetch_assoc($result1)) 
   { 
      foreach($query_row as $key => $value) 
      { 
         echo "Your $key is $value<br />\n"; 



      } 
      echo "\n"; 
   } 
}

if ($user=="") {header('Location: /');} else {echo "<br>";}
if (!$_GET['page']) {$page = "0";}
else {$page = $_GET['page'];}
 $pageup = $page+10;
 $pagedown = $page-10;
$numpages = mysql_num_rows(mysql_query("SELECT * FROM status"));
if ($page=="0") {$page1 = "Previous Page";} else {$page1 = "<a href='?page=$pagedown'>Previous Page</a>";}

If ($page>=$numpages) {$page2 = "<font color=grey>Next Page</font>";} else {$page2 = "<a href='?page=$pageup'>Next Page</a>";}

 Echo "$page1  |  $page2 <hr/><a href=/>Home</a> | <a href=''>Refresh</a><br/><br/>"; ?>

<form name="input" action="post.php" method="post"
 onsubmit="document.getElementById('Submit').value='Posting!'; document.getElementById('Submit').disabled=true;">
<input type="text" name="status" placeholder="Type Status Here">
<input type="submit" value="Post" id="Submit" />
</form> <hr>
<center>
<? 


$queryf = mysql_query("SELECT * FROM status ORDER BY id DESC LIMIT $page, 10");


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
$status = nl2br($row['status']);
echo "



<div id=status>
<div id=first><a href='/profiles/index.php?user=" . $row['username'] . "'>" . $row['username'] . "</a>            |         $value8
 <br/><font color=grey>" . $row['time'] . "</font><br><font color=silver>$lastonline $Chronology Ago</font></div><br/> 
$status<br><div id=last><b>ID: </b><font color=purple>" . $row['id'] . "</font>";


if ($value=='<font color=green>Mod</font>' || $value=='<font color=red>Admin</font>')


 {$close = " | <b>IP: </b><font color=purple>" . $row['ip'] . "</font><a href=deletebyid.php?id=" . $row['id'] . "><img src=http://www.myfloridalicense.com/dbpr/abt/eds/images/red-delete-x-button.jpg></a>

";}


 else {$close = "";}
echo "

$close

<hr>
<a href=\"javascript:ajaxpage('/setlikes.php?id=" . $row['id'] . "&like=yes&type=Status', 'AJAXarea');\"><img src=https://ssl.gstatic.com/s2/oz/images/stars/po/SRP/p1on2.gif width=50></a> 
<a href=\"javascript:ajaxpage('/setlikes.php?id=" . $row['id'] . "&like=no&type=Status', 'AJAXarea');\"><img src='-1.png'></a> <br>
<font color=green size=5><a onclick=\"toggle_visibility('Likes" . $row['id'] . "');\">Likes: $numlikes</a></font>
<div id=Likes" . $row['id'] . " style='display: none;'>";
if($numlikes=="0") {echo "<font color=green>No Likes</font>";}
else {echo "<iframe src=dis-likes.php?id=$id&like=yes></iframe><br>";}

echo "</div>
<a onclick=\"toggle_visibility('DisLikes" . $row['id'] . "');\"> | <font color=red size=5>Dislikes: $numdis</font></a><br>
<div id=DisLikes" . $row['id'] . " style='display: none;'>";
if($numdis=="0") {echo "<font color=red>No Dislikes</font>";}
else {echo "<iframe src=dis-likes.php?id=$id&like=no></iframe><br>";} echo "</div>
<font color=purple size=5>Total: $total</font>
<br><hr><br>
<font color=navy size=5><a href=comments.php?commid=" . $row['id'] . ">Comments($numcomm)</a></font>





</div></div>

<div id=AJAXarea></div>
";} ?>


<script>
window.onload = function() {
 	setTimeout(toggle_visibility,20000)
 }

    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }

</script>