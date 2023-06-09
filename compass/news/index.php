<script type="text/javascript" src="../pc/js/jquery-1.3.2.min.js"></script>
<script src="../profiles/bottom.js"></script>
<center>
<?
include '../db.php';
include '../ckban.php';
$place = "Catching Up On News";
 mysql_query("UPDATE users SET lastdoing='$place' WHERE username='" . $_COOKIE['user'] . "'");  
$user = $_COOKIE['user'];
$pass = hash(sha512, $_COOKIE['pass']);
$query1 = "SELECT rank FROM users WHERE username='$user' AND password='$pass'"; 
$result1 = mysql_query($query1); 
if($result1 == false) 
{user_error("Query failed: " . mysql_error() . "<br />\n$query1");} 
elseif(mysql_num_rows($result1) == 0) 
{echo "<p>Sorry, no rows were returned by your query.</p>\n<meta http-equiv='REFRESH' content='0;url=/'>";exit();} 
else 
{while($query_row = mysql_fetch_assoc($result1))  {foreach($query_row as $key => $value) 
      {}}}

if ($user=="") {header('Location: /');exit();} else {}
if (!$_GET['page']) {$page = "0";}
else {$page = $_GET['page'];}
 $pageup = $page+10;
 $pagedown = $page-10;

$numpages = mysql_num_rows(mysql_query("SELECT * FROM `blogs` WHERE `type`='news'"));
if ($page=="0") {$page1 = "Previous Page";} else {$page1 = "<a href='?page=$pagedown'>Previous Page</a>";}

If ($page>=$numpages) {$page2 = "<font color=grey>Next Page</font>";} else {$page2 = "<a href='?page=$pageup'>Next Page</a>";}

 Echo "$page1  |  $page2 <hr/><a href=/>Home</a> | <a href=''>Refresh</a><br/><br/>"; 









$queryf = mysql_query("SELECT * FROM `blogs` WHERE `type`='news' ORDER BY id DESC LIMIT $page, 10");


While ($row = mysql_fetch_array($queryf))
 {

$lastonline = strtotime($row['time']);
$now = TIME();

include '../time.php'; 

$main = nl2br($row['main']);
echo "<div id=news>" . $row['title'] . "<br>By: <b><a href=profiles/index.php?user=" . $row['username'] . ">
" . $row['username'] . "</a></b><br>$lastonline $Chronology Ago<br>$main
<br>

<span id=commlink><a href=\"javascript:ajaxpage('comments.php?id=" . $row['ID'] . "', 'comments');
ajaxpage('blank.php', 'commlink');\">Comments</a></span>
<div id=comments></div></div>


<br><hr><br>
";
}
