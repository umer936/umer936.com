<link rel="stylesheet" href="tablesorter/style.css">
<script type="text/javascript" src="tablesorter/jquery-latest.js"></script> 
<script type="text/javascript" src="tablesorter/jquery.tablesorter.min.js"></script> 
<html manifest = "cache.manifest">

<?
include 'db.php';

$team = $_GET['Team'];

echo "<title>$team</title>";

$sql = "SELECT `Team_Number`,`Team_Name`,`Location`,`Drivetrain:`,`Can cross these defenses:`,`Low Bar:`,`High Goal:`,`Low Goal:`,`Auton:`,`Notes and Links:` FROM `".$regional_name."Robots` WHERE `Team_Number` = $team";

$result = $conn->query($sql);

echo "<table id='RobotInfo' class='tablesorter'><thead>
<tr>
    <th>Team Number</th> 
    <th>Team Name</th> 
    <th>Location</th> 
    <th>Drivetrain</th> 
    <th>Can cross</th> 
<th>Low Bar</th> 
    <th>High Goal</th> 
    <th>Low Goal</th> 
    <th>Auton</th> 
    <th>Notes</th>  
</tr>
</thead>
<tbody>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
		foreach($row as $value)
		{
        	echo "<td>".$value."</td>";
    	}
		echo "</tr>";  
	}
} else {
    echo "0 results";
}

echo "</tbody></table>";

$sql="SELECT `ScoutedBy`,`Match_Number`,`Match_Type`,`A_StartsWithBall`,`A_SpyBox`,`A_ReachesDefense`,`A_CrossesDefense`,`A_LowGoal`,`A_HighGoal`,`LowGoal`,`HighGoal`,`HighGoalFails`,`Passed`,`E_Challenge`,`E_Climb`,`DefensivePushing`,`D_LowBar`,`D_Portcullis`,`D_ShovelTheFries`,`D_Moat`,`D_Ramparts`,`D_Drawbridge`,`D_SallyPort`,`D_RockWall`,`D_RoughTerrain`,`Intake`,`Comments` FROM `".$regional_name."Matches` WHERE `Team_Number` = '$team' ORDER BY `Match_Number`";
$result = $conn->query($sql);

echo "<table id='Matches' class='tablesorter'><thead>
<tr>
    <th>Scouted By</th> 
    <th>Match_Number</th> 
	<th>Match_Type</th> 
    <th>A_StartsWithBall</th> 
    <th>A_SpyBox</th> 
    <th>A_ReachesDefense</th> 
    <th>A_CrossesDefense</th> 
    <th>A_LowGoal</th> 
    <th>A_HighGoal</th> 
    <th>LowGoal</th> 
    <th>HighGoal</th> 
    <th>HighGoalFails</th> 
    <th>Passed</th> 
	<th>E_Challenge</th> 
    <th>E_Climb</th> 
    <th>DefensivePushing</th> 
    <th>D_LowBar</th> 
    <th>D_Portcullis</th> 
    <th>D_ShovelTheFries</th> 
    <th>D_Moat</th> 
    <th>D_Ramparts</th> 
    <th>D_Drawbridge</th> 
    <th>D_SallyPort</th> 
    <th>D_RockWall</th> 
    <th>D_RoughTerrain</th> 
    <th>Intake</th> 
    <th>Comments</th> 
</tr>
</thead>
<tbody>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
		foreach($row as $value)
		{
        	echo "<td>".$value."</td>";
    	}
		echo "</tr>";  
	}
} else {
    echo "0 results";
}

echo "</tbody></table>";
$conn->close();


$dirname = "uploads/" . $team;
// echo "$dirname";
$images = glob($dirname . "_*.*");
foreach($images as $image) {
echo '<a href='.$image.'>'.$image.'</a><br />';
// echo "<button data-rel=".$image.">".$image."</button><br />
// <div id=area></div><br />";
}

?>

<div id="area"></div>
<script>
$(document).ready(function() 
    { 
        $('#RobotInfo').tablesorter();
        $('#Matches').tablesorter(); 
    } 
); 
</script>