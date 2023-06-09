<? 
$team1 = $_GET['Team1']; 
$team2 = $_GET['Team2']; 
$team3 = $_GET['Team3']; 

echo "

<iframe src='viewteam.php?Team=$team1' width='100%' height='33%'>
</iframe>
<br />

";

echo "

<iframe src='viewteam.php?Team=$team2' width='100%' height='33%'>
</iframe>
<br />

";

echo "

<iframe src='viewteam.php?Team=$team3' width='100%' height='33%'>
</iframe>

";