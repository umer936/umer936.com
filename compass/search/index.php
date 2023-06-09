<? include '../db.php' ?>
<a href=/>Home</a><br><br><BR>
<meta name="viewport" content="width=device-width" />

<style> fieldset {
width:50%;
}

#wholestatus,#wholeusers {
border:3px double red;
background-color:#FF0;
}

hr {
border:2px solid #32CD32;
}

#wholetotal {
border:5px groove #8B0000;
background-image:url('http://images2.layoutsparks.com/1/196160/abstract-hearts-shaded-pink-31000.gif');
}

body {
background:url("http://www.photoshopstar.com/wp-content/uploads/2008/02/radial-gradient-added.jpg");
}</style>

<!-- Confuzzle -->
<div id=wholetotal>
<?php
 if (!$_GET['q']) {echo "<title>Search</title>";} else {echo "<title>" . $_GET['q'] . " - Search</title>";}

 If (!conn) {echo "Whoops! The search engine gotted eatened bai teh Confuzzle benneh. Letz wate till he regurgitates. :)";} else {
 echo "<center>
 <form method='get' name=search><input type='search' name='q' value='" . $_GET['q'] . "' id='search'><br><input type='submit' value='Enter'></form>";
 $q = $_GET['q'];

If ($_GET['q']) {
$row['Site'] = Str_ireplace($_GET['q'], "<b>$q</b>", $row['Site']);
 $the_usr = mysql_query("SELECT * FROM users WHERE username LIKE '%$q%'");
Echo "<br><div id=wholeusers>User Search:<hr><br><div id='user' style=''>";
 while ($row = mysql_fetch_array($the_usr)) {
 echo "<b><font size=5><a href='/profiles/?user=" . $row['username'] . "'>" . $row['username'] . "</a></font></b><br>" . $row['Opinion'] . "<hr>";}
Echo "</div></div><hr><br><br><div id=wholestatus style=''>Status Search:<br><br><br><div id='status' style=''>";


$status = mysql_query("SELECT * FROM status WHERE status LIKE '%$q%' ORDER BY id DESC");
while ($rop = mysql_fetch_array($status)) {
//$status = $rop['status'];
//$rop['status'] = strip_tags($status);
$actual = $rop['id'];
$page1 = mysql_num_rows(mysql_query("SELECT * FROM status WHERE id < $actual"));
$page = mysql_num_rows(mysql_query("SELECT * FROM status")) - $page1 - 1;

echo "<hr>
<b><font size=5><a href=/profiles/?user=" . $rop['username'] . ">" . $rop['username'] . "</a></font></b><br>
<font color=grey>" . $rop['time'] . "</font><br>
<a href='/status/?page=$page' title='Status By: " . $rop['username'] . "'>
" . $rop['status'] . "<br></a>
<b>ID:</b> " . $rop['id'] . "<br>
<br><br><br>


";}}

Else {echo "<font color=red>enter a search term, then press enter...</font>";}}
?></div></div></div>