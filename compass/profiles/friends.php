<?

include '../ckban.php'; 
include '../db.php'; 

$query = mysql_query("SELECT * FROM `friends` WHERE `From` = '" . $_GET[user] . "'");
while ($row = mysql_fetch_array($query)) {
    echo $row['Request'];
    echo "<br>";
$lastonline = strtotime($row['Time']);
$now = TIME();
include '../time.php';
echo "$lastonline $Chronology Ago<hr>";
}			