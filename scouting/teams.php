<html manifest = "cache.manifest">
<?
include 'db.php';

$team = $_GET['Team'];

$sql="SELECT Team_Number,Team_Name FROM ".$regional_name."Robots";
$result = $conn->query($sql);

while($row = mysqli_fetch_array($result)){
      echo "<a href=viewteam.php?Team=" . $row['Team_Number'] . ">";
      echo $row['Team_Number'];
      echo " -- ";
      echo $row['Team_Name'];
      echo "</a>";
      echo "<hr />";
 }
