<link rel="stylesheet" type="text/css" href="feed.css" />
<meta name="viewport" content="width=device-width">
<script src=AJAX.js></script>
<? include 'input.php'; 
flush();
include '../ckban.php'; ?>
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
      this.value = "";}return false;}
    inputs[i].onblur = function() {
     if (this.value.length < 1) {
      this.value = this.getAttribute("placeholder");}}}}}}
window.onload=function() {activatePlaceholders();}
</script>
<? include('../db.php');
$place = "On Status";
 mysql_query("UPDATE users SET lastdoing='$place' WHERE username='" . $_COOKIE['user'] . "'");  
$user = $_COOKIE['user'];
$pass = hash(sha512, $_COOKIE['pass']);
$query1 = "SELECT rank FROM users WHERE username='$user' AND password='$pass'"; 
$result1 = mysql_query($query1); 
if($result1 == false) 
{user_error("Query failed: " . mysql_error() . "<br />\n$query1");} 
elseif(mysql_num_rows($result1) == 0) {echo "<p>Sorry, no rows were returned by your query.</p>\n<meta http-equiv='REFRESH' content='0;url=/'>";} 
else {while($query_row = mysql_fetch_assoc($result1)){foreach($query_row as $key => $value){echo "";} 
echo "\n";}}

if ($user=="") {header('Location: /');} else {}
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





<? 
$queryf = mysql_query("SELECT * FROM status ORDER BY id DESC LIMIT $page, 10");
While ($row = mysql_fetch_array($queryf))
 {
$quered="SELECT * FROM users WHERE username='".$row['username']."'";
$sqlthing=mysql_query($quered);
while($thing=mysql_fetch_array($sqlthing)){
$value8 = $thing['rank']; $avi = $thing['Avatar'];}


$lastonline = strtotime($row['time']);
$now = TIME();


$numcomm = mysql_num_rows(mysql_query("SELECT * FROM comments WHERE statid='" . $row['id'] . "'"));
$numlikes = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE ID='" . $row['id'] . "' AND Value='1'"));
$numdis = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE ID='" . $row['id'] . "' AND Value='-1'"));
$total = $numlikes - $numdis;

include '../time.php';

$id = $row['id'];
if ($value=='<font color=green>Mod</font>' || $value=='<font color=red>Admin</font>')


 {$right = " | <b>IP: </b><font color=purple>" . $row['ip'] . "</font><a href=deletebyid.php?id=" . $row['id'] . "><img src=http://www.myfloridalicense.com/dbpr/abt/eds/images/red-delete-x-button.jpg></a>";}
echo "

<div id=status>";

if($row['username']==$_COOKIE['user']) {echo "<div class=triangle-left>"; $own = 'true';}
else {echo "<div class=triangle-right>"; $own = 'false';}


$status = nl2br($row['status']);
echo "
<div style=\"float:left;\"><a href='/profiles/index.php?user=" . $row['username'] . "'>" . $row['username'] . "</a>            |         $value8</div> 
<div style=\"float:right;\"><b>ID: </b><font color=purple>" . $row['id'] . "</font>$right</div>
 <br/>
<br/> <b><font size=3>$status</font></b><br>



<center>
<a href=\"javascript:ajaxpage('/setlikes.php?id=" . $row['id'] . "&like=yes&type=Status', 'AJAXarea');\">
<img src=https://ssl.gstatic.com/s2/oz/images/stars/po/SRP/p1on2.gif width=40></a>
<a href=\"javascript:ajaxpage('/setlikes.php?id=" . $row['id'] . "&like=yes&type=Status', 'AJAXarea');\">
<img src='-1.png' width=40></a> <br>
<font color=green size=5>
Likes: $numlikes</font>
 | 
<a onclick=\"toggle_visibility('AllLikes" . $row['id'] . "');\">
<font color=red size=5>
Dislikes: $numdis</font>
</center>

<font color=navy size=5><a href=comments.php?commid=" . $row['id'] . ">Comments($numcomm)</a></font><br>
<font color=silver style=\"float:right;\">$lastonline $Chronology Ago</font>
</div>";
if($own=='true') {echo "<img src=$avi style=\"float:right; width: 60; height: 60; border-bottom-right-radius: 10px 10px; -moz-border-bottom-right-radius: 10px 10px;\">";}
else {echo "<img src=$avi style=\"float:left; margin-left: 5%; width: 60; height: 60;\">";}

echo "
<br><br><br>
</div></div>
";} ?>