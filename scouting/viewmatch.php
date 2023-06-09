<link rel="stylesheet" href="tablesorter/style.css">
<script type="text/javascript" src="tablesorter/jquery-latest.js"></script> 
<script type="text/javascript" src="tablesorter/jquery.tablesorter.min.js"></script> 
<html manifest = "cache.manifest">

<?
include 'db.php';

$match = $_GET['Match'];

echo "<title>$match</title>";

$sql = "SELECT `ScoutedBy`,`Team_Number`,`Match_Type`,`A_StartsWithBall`,`A_SpyBox`,`A_ReachesDefense`,`A_CrossesDefense`,`A_LowGoal`,`A_HighGoal`,`LowGoal`,`HighGoal`,`HighGoalFails`,`Passed`,`E_Challenge`,`E_Climb`,`DefensivePushing`,`D_LowBar`,`D_Portcullis`,`D_ShovelTheFries`,`D_Moat`,`D_Ramparts`,`D_Drawbridge`,`D_SallyPort`,`D_RockWall`,`D_RoughTerrain`,`Intake`,`Comments` FROM `".$regional_name."Matches` WHERE `Match_Number` = '$match' ORDER BY `Team_Number`";

$result = $conn->query($sql);

echo "<table id='Match' class='tablesorter'><thead>
<tr>
    <th>Scouted By</th> 
    <th>Team_Number</th> 
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

?>

<div id="area"></div>
<script>
$(document).ready(function() 
    { 
        $('#Match').tablesorter(); 
    } 
); 
</script>