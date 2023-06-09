      <?
include('../db.php');
$like = $_GET['like'];
$id = $_GET['id'];
if(isset($like)) {

if($like=="yes") 
{echo "<font color=green>";
$querty = mysql_query("SELECT * FROM likes WHERE ID='$id' AND Value='1'"); 
while($rotw = mysql_fetch_array($querty)){

if($rotw['Name']==$_COOKIE['user']) 
{echo $rotw['Name']; echo " <a href=unlike.php?id=$id>UnLike</a><br>";}
else {


	echo $rotw['Name'];
	echo "<br />";
}}} 

elseif($like=="no") 
{echo "<font color=red>";
$querty = mysql_query("SELECT * FROM likes WHERE ID='$id' AND Value='-1'"); 
while($rotw = mysql_fetch_array($querty)){

if($rotw['Name']==$_COOKIE['user']) 
{echo $rotw['Name']; echo " <a href=unlike.php?id=$id>UnLike</a><br>";}
else {

	echo $rotw['Name'];
	echo "<br />";
}}}
 else {echo "";}}
 else {echo "<br>";}  ?>