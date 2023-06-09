<?php
$user = $_COOKIE['user']; 
$place = "On Leaderboard";
include('../db.php'); 
include('../update.php'); ?><center><title>Leaderboard</title>
<?php
echo "LeaderBoard:"; 
$result2 = mysql_query("SELECT * FROM users ORDER BY points desc LIMIT 3");
  echo "<center>
    ";
    while ($row = mysql_fetch_array($result2)) {
      echo "";
      echo "<a href=/profiles/index.php?user=" . $row['username'] . " style=color:gray>" . $row['username'] . "</a> | ";
      echo "" . $row['points'] . "<hr>";
      echo "";
    }
  echo "</table>"; ?>