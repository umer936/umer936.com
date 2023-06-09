<?
include "db.php";
?>
<?
$stmt = $conn->prepare("INSERT INTO ".$regional_name."Matches (
	ScoutedBy, 
	Team_Number, 
	Match_Number,
	A_StartsWithBall, 
	A_SpyBox, 
	A_ReachesDefense,
	A_CrossesDefense,
	A_LowGoal,
	A_HighGoal,
	LowGoal,
	HighGoal,
	HighGoalFails,
	Passed,
	E_Challenge,
	E_Climb,
	DefensivePushing,
	D_Portcullis,
	D_LowBar,
	D_ShovelTheFries,
	D_Moat,
	D_Ramparts,
	D_Drawbridge,
	D_SallyPort,
	D_RockWall,
	D_RoughTerrain,
	Intake,
	Comments
	) VALUES (
	?, 
	?, 
	?,
	?, 
	?, 
	?, 
	?, 
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?,
	?
	)
	");
if ( false===$stmt ) {
  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}


$rc = $stmt->bind_param(
	"siissssiiiiiisiiiiiiiiiiiis", 
	$Scout, 
	$Team_Number, 
	$Match_Number,
	$A_StartsWithBall,
	$A_SpyBox,
	$A_ReachesDefense,
	$A_CrossesDefense,
	$A_LowGoal,
	$A_HighGoal,
	$LowGoal,
	$HighGoal,
	$HighGoalFails,
	$Passes,
	$Challenges,
	$Tower,
	$Pushing,
	$D_Portcullis,
	$D_LowBar,
	$D_ShovelTheFries,
	$D_Moat,
	$D_Ramparts,
	$D_Drawbridge,
	$D_SallyPort,
	$D_RockWall,
	$D_RoughTerrain,
	$Intake,
	$Comments
	);

$Scout = $_COOKIE['Scout'];
$Team_Number = $_POST['Team_Number'];
$Match_Number = $_POST['Match_Number'];
$A_StartsWithBall = $_POST['A_Boulder'];
$A_StartsWithBall = $_POST['A_SpyBox'];
$A_ReachesDefense = $_POST['A_ReachesDefense'];
$A_CrossesDefense = $_POST['A_Defense'];
$A_LowGoal = $_POST['A_LowGoal'];
$A_HighGoal = $_POST['A_HighGoal'];
$LowGoal = $_POST['T_LowGoal'];
$HighGoal = $_POST['T_HighGoal'];
$HighGoalFails = $_POST['T_HighGoalFails'];
$Passes = $_POST['Passes'];
$Challenges = $_POST['Challenges'];
$Tower = $_POST['Tower'];
$Pushing = $_POST['Pushing'];
$D_LowBar = $_POST['D_LowBar'];
$D_Portcullis = $_POST['D_Portcullis'];
$D_ShovelTheFries = $_POST['D_ShovelTheFries'];
$D_Moat = $_POST['D_Moat'];
$D_Ramparts = $_POST['D_Ramparts'];
$D_Drawbridge = $_POST['D_Drawbridge'];
$D_SallyPort = $_POST['D_SallyPort'];
$D_RockWall = $_POST['D_RockWall'];
$D_RoughTerrain = $_POST['D_RoughTerrain'];
$Intake = $_POST['Intake'];
$Comments = $_POST['Comments'];

if ( false===$rc ) {
  die('bind_param() failed: ' . htmlspecialchars($stmt->error));
}

$rc = $stmt->execute();

if ( false===$rc ) {
  die('execute() failed: ' . htmlspecialchars($stmt->error));
}
$stmt->close();
$conn->close();

// echo "$teamname";
?>

<?

// $server = 'tfs.centaurisoftware.co\SCOUT';
// $link = mssql_connect($server, 'umer', '1qazXSW@3edcVFR$');

// if (!$link)
//  {
//     die('Something went wrong while connecting to MSSQL');
// }

// $submit = $link->prepare("INSERT INTO ".$regional_name."Matches (
// 	competitionID,
// 	competitionDate,
// 	teamNumber,
// 	teamName,
// 	matchNumber,
// 	autonBoulders,
// 	teleopBoulders,
// 	autonPoints,
// 	teleopPoints,
// 	penaltyPoints,
// 	entryTime
// 	)

// 	VALUES 
// 	(
// 	?,
// 	?,
// 	?,
// 	?,
// 	?,
// 	?,
// 	?,
// 	?,
// 	?,
// 	?,
// 	?
// 	)
// 	");

// if ( false===$submit ) {
//   die('prepare() failed: ' . htmlspecialchars($link->error));
// }


// $data = $submit->bind_param(
// 	"ssisiiiiiis", 
// 	$competitionID,
// 	$competitionDate,
// 	$teamNumber,
// 	$teamName,
// 	$matchNumber,
// 	$autonBoulders,
// 	$teleopBoulders,
// 	$autonPoints,
// 	$teleopPoints,
// 	$penaltyPoints,
// 	$entryTime
// 	);

// $competitionID = "".$regional_name."";
// $competitionDate = "11/03/2016";
// $teamNumber = $_POST['Team_Number'];
// $teamName = $teamname;
// $matchNumber = $_POST['Match_Number'];
// $autonBoulders = $_POST['A_HighGoal'] + $_POST['A_LowGoal'];
// $teleopBoulders = $_POST['T_HighGoal'] + $_POST['T_LowGoal'];
// if($_POST['A_ReachesDefense'] == "Yes") {
// 	$A_RD = 2;
// }
// else {
// 	$A_RD = 0;
// }
// if($_POST['A_Defense'] != "") {
// 	$A_D = 10;
// }
// else {
// 	$A_D = 0;
// }
// if($_POST['A_LowGoal'] != 0) {
// 	$A_LG = $_POST['A_LowGoal'] * 5;
// }
// if($_POST['A_HighGoal'] != 0) {
// 	$A_HG = $_POST['A_HighGoal'] * 10;
// }
// $autonPoints = $A_RD + $A_D + $A_LG + $A_HG;
// $D_LowBar = $_POST['D_LowBar'];
// $D_Portcullis = $_POST['D_Portcullis'];
// $D_ShovelTheFries = $_POST['D_ShovelTheFries'];
// $D_Moat = $_POST['D_Moat'];
// $D_Ramparts = $_POST['D_Ramparts'];
// $D_Drawbridge = $_POST['D_Drawbridge'];
// $D_SallyPort = $_POST['D_SallyPort'];
// $D_RockWall = $_POST['D_RockWall'];
// $D_RoughTerrain = $_POST['D_RoughTerrain'];
// $defense = 0;
// if($D_LowBar > 0) {
// 	$defense = $defense + 1;
// }
// if($D_Portcullis > 0) {
// 	$defense = $defense + 1;
// }
// if($D_ShovelTheFries > 0) {
// 	$defense = $defense + 1;
// }
// if($D_Moat > 0) {
// 	$defense = $defense + 1;
// }
// if($D_Ramparts > 0) {
// 	$defense = $defense + 1;
// }
// if($D_Drawbridge > 0) {
// 	$defense = $defense + 1;
// }
// if($D_SallyPort > 0) {
// 	$defense = $defense + 1;
// }
// if($D_RockWall > 0) {
// 	$defense = $defense + 1;
// }
// if($D_RoughTerrain > 0) {
// 	$defense = $defense + 1;
// }
// $LG = $_POST['T_LowGoal'] * 2;
// $HG = $_POST['T_HighGoal'] * 5;
// $challenged = $_POST['Challenges'] * 5;
// if($_POST['Tower'] > 0) {
// 	$tower = 15;
// }
// $teleopPoints = $defense * 5 + $LG + $HG + $challenged + $tower;
// $penaltyPoints = $_POST['Penalties'] * 5;
// $time = gmdate("d/m/Y H:i:s", time());
// $entryTime = $time;



// if ( false===$data ) {
//   die('bind_param() failed: ' . htmlspecialchars($link->error));
// }

// $data = $submit->execute();

// if ( false===$data ) {
//   die('execute() failed: ' . htmlspecialchars($link->error));
// }

// $submit->close();
// $link->close();




?>




<?



echo "<script type='text/javascript'>alert('Yay, it submitted!');</script>";
header('Location: /');
exit;