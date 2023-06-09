<? 
if(!$_COOKIE['Scout']) {
	header('Location: setcookie.php');
	exit;
}
else {

}
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
	br {padding: 5%;}
</style>
<body>
	<a href=pitscouting.php>Pit Scouting</a>  |  <a href=teams.php>View Teams</a>  |  <a href=DefensePicker.php>Defense Picker</a>
	<hr>
	<form action="ryansubmit.php" method="post">
		Team Number: 
		<input type="number" name="Team_Number">
		<br>
		Match Number: 
		<input type="number" name="Match_Number">
		<hr>
		<h1>Autonomous </h1>
		<br>
		Start With Boulder: 
		<input type="checkbox" value="Yes" name="A_Boulder">
		<br>
		Starts in Spybox (not in the neutral zone): 
		<input type="checkbox" value="Yes" name="A_SpyBox">
		<br>
		Reached A Defense: 
	  	<input type="checkbox" value="Yes" name="A_ReachesDefense">
		<br>
		<br>
		Crossed: 
		<br>
		Low Bar: 
	  	<input type="radio" name="A_Defense" value="LowBar">
	  	<br>
	  	Portcullis: 
	  	<input type="radio" name="A_Defense" value="Portcullis">
	  	<br>
	  	Sally Port: 
	  	<input type="radio" name="A_Defense" value="SallyPort">
	  	<br>
	  	Rock Wall: 
	  	<input type="radio" name="A_Defense" value="RockWall">
	  	<br>
	  	Shovel The Fries: 
	  	<input type="radio" name="A_Defense" value="Shovel">
	  	<br>
	  	Ramparts: 
	  	<input type="radio" name="A_Defense" value="Ramparts">
	  	<br>
	  	Moat: 
	  	<input type="radio" name="A_Defense" value="Moat">
	  	<br>
	  	<br>
	  	Low Goal Scores: 
	  	<button onclick='add("-1", "A_LowGoal");return false;'>-1</button>
	  	<input type="number" name="A_LowGoal" id="A_LowGoal" value="0">
	  	<button onclick='add("1", "A_LowGoal");return false;'>+1</button>
	  	<br>
	  	High Goal Scores: 
	  	<button onclick='add("-1", "A_HighGoal");return false;'>-1</button>
	  	<input type="number" name="A_HighGoal" id="A_HighGoal" value="0">
	  	<button onclick='add("1", "A_HighGoal");return false;'>+1</button>
	  	<hr>
	  	<h1>TeleOp</h1>
	  	<br>
	  	Low Goal Scores: 
	  	<button onclick='add("-1", "T_LowGoal");return false;'>-1</button>
	  	<input type="number" name="T_LowGoal" id="T_LowGoal" value="0">
	  	<button onclick='add("1", "T_LowGoal");return false;'>+1</button>
	  	<br>
	  	High Goal Scores: 
		<button onclick='add("-1", "T_HighGoal");return false;'>-1</button>
	  	<input type="number" name="T_HighGoal" id="T_HighGoal" value="0">
	  	<button onclick='add("1", "T_HighGoal");return false;'>+1</button>
	  	<br>
	  	High Goal Misses: 
	  	<button onclick='add("-1", "T_HighGoalFails");return false;'>-1</button>
	  	<input type="number" name="T_HighGoalFails" id="T_HighGoalFails" value="0">
	  	<button onclick='add("1", "T_HighGoalFails");return false;'>+1</button>
	  	<br>
	  	<br>
	  	Low Bar: 
	  	<br>
	  	Attempted, but failed: 
	  	<input type="radio" name="D_LowBar" value="0">
	  	<br>
	  	Slow: 
	  	<input type="radio" name="D_LowBar" value="1">
	  	<br>
	  	Decent:
	  	<input type="radio" name="D_LowBar" value="2">
	  	<br>
	  	Fast:
	  	<input type="radio" name="D_LowBar" value="3">
	  	<br>	  	
	  	<br>
	  	Portcullis  	
	  	<br>
	  	Attempted, but failed: 
	  	<input type="radio" name="D_Portcullis" value="0">
	  	<br>
	  	Slow: 
	  	<input type="radio" name="D_Portcullis" value="1">
	  	<br>
	  	Decent:
	  	<input type="radio" name="D_Portcullis" value="2">
	  	<br>
	  	Fast:
	  	<input type="radio" name="D_Portcullis" value="3">
	  	<br>	  	
	  	<br>
	  	Shovel The Fries  	
	  	<br>
	  	Attempted, but failed: 
	  	<input type="radio" name="D_ShovelTheFries" value="0">
	  	<br>
	  	Slow: 
	  	<input type="radio" name="D_ShovelTheFries" value="1">
	  	<br>
	  	Decent:
	  	<input type="radio" name="D_ShovelTheFries" value="2">
	  	<br>
	  	Fast:
	  	<input type="radio" name="D_ShovelTheFries" value="3">
	  	<br>	  	
	  	<br>
	  	Moat  	
	  	<br>
	  	Attempted, but failed: 
	  	<input type="radio" name="D_Moat" value="0">
	  	<br>
	  	Slow: 
	  	<input type="radio" name="D_Moat" value="1">
	  	<br>
	  	Decent:
	  	<input type="radio" name="D_Moat" value="2">
	  	<br>
	  	Fast:
	  	<input type="radio" name="D_Moat" value="3">
	  	<br>	  	
	  	<br>
	  	Ramparts
	  	<br>
	  	Attempted, but failed: 
	  	<input type="radio" name="D_Ramparts" value="0">
	  	<br>
	  	Slow: 
	  	<input type="radio" name="D_Ramparts" value="1">
	  	<br>
	  	Decent:
	  	<input type="radio" name="D_Ramparts" value="2">
	  	<br>
	  	Fast:
	  	<input type="radio" name="D_Ramparts" value="3">
	  	<br>	  	
	  	<br>
	  	Drawbridge  	
	  	<br>
	  	Attempted, but failed: 
	  	<input type="radio" name="D_Drawbridge" value="0">
	  	<br>
	  	Slow: 
	  	<input type="radio" name="D_Drawbridge" value="1">
	  	<br>
	  	Decent:
	  	<input type="radio" name="D_Drawbridge" value="2">
	  	<br>
	  	Fast:
	  	<input type="radio" name="D_Drawbridge" value="3">
	  	<br>	  	
	  	<br>
	  	Sallyport  	
	  	<br>
	  	Attempted, but failed: 
	  	<input type="radio" name="D_SallyPort" value="0">
	  	<br>
	  	Slow: 
	  	<input type="radio" name="D_SallyPort" value="1">
	  	<br>
	  	Decent:
	  	<input type="radio" name="D_SallyPort" value="2">
	  	<br>
	  	Fast:
	  	<input type="radio" name="D_SallyPort" value="3">
	  	<br>	  	
	  	<br>
	  	Rockwall  	
	  	<br>
	  	Attempted, but failed: 
	  	<input type="radio" name="D_RockWall" value="0">
	  	<br>
	  	Slow: 
	  	<input type="radio" name="D_RockWall" value="1">
	  	<br>
	  	Decent:
	  	<input type="radio" name="D_RockWall" value="2">
	  	<br>
	  	Fast:
	  	<input type="radio" name="D_RockWall" value="3">
	  	<br>	  	
	  	<br>
	  	Rough Terrain  	
	  	<br>
	  	Attempted, but failed: 
	  	<input type="radio" name="D_RoughTerrain" value="0">
	  	<br>
	  	Slow: 
	  	<input type="radio" name="D_RoughTerrain" value="1">
	  	<br>
	  	Decent:
	  	<input type="radio" name="D_RoughTerrain" value="2">
	  	<br>
	  	Fast:
	  	<input type="radio" name="D_RoughTerrain" value="3">
	  	<br>	  	
	  	<br>
		Passes: 
	  	<br>
	  	Fails: 
	  	<input type="radio" name="Passes" value="0">
	  	<br>
	  	Slow: 
	  	<input type="radio" name="Passes" value="1">
	  	<br>
	  	Decent:
	  	<input type="radio" name="Passes" value="2">
	  	<br>
	  	Fast:
	  	<input type="radio" name="Passes" value="3">
	  	<br>
	  	<br>
	  	Intake: 
	  	<br>
	  	Fails: 
	  	<input type="radio" name="Intake" value="0">
	  	<br>
	  	Slow: 
	  	<input type="radio" name="Intake" value="1">
	  	<br>
	  	Decent:
	  	<input type="radio" name="Intake" value="2">
	  	<br>
	  	Fast:
	  	<input type="radio" name="Intake" value="3">
	  	<br>
	  	<br>
	  	Defensive Pushing: 
	  	<button onclick='add("-1", "Pushing");return false;'>-1</button>
	  	<input type="number" name="Pushing" id="Pushing" value="0">
	  	<button onclick='add("1", "Pushing");return false;'>+1</button>
	  	<br>
	  	Penalties (ref raises red baton thing): 
	  	<button onclick='add("-1", "Penalties");return false;'>-1</button>
	  	<input type="number" name="Penalties" id="Penalties" value="0">
	  	<button onclick='add("1", "Penalties");return false;'>+1</button>
	  	<hr>
	  	<h1>Endgame</h1>
	  	Challenges Tower (on the batter in endgame):
	  	<br>
	  	No:
	  	<input type="radio" name="Challenges" value="No">
	  	Yes:
	  	<input type="radio" name="Challenges" value="Yes">
	  	<br>
	  	<br>
	  	Climbs Tower (higher than the black line at the top of the low goal): 
	  	<br>
	  	Fails: 
	  	<input type="radio" name="Tower" value="0">
	  	<br>
	  	Slow: 
	  	<input type="radio" name="Tower" value="1">
	  	<br>
	  	Decent:
	  	<input type="radio" name="Tower" value="2">
	  	<br>
	  	Fast:
	  	<input type="radio" name="Tower" value="3">
	  	<br>
		<hr>
		<h1>Comments:</h1>
		<br>
		Write anything that seems important that wasn't above (eg: helped a robot through portcullis)
		<br> 
		<textarea name="Comments"></textarea>
		<br>
	  	<input type="submit">
	</form>
</body>
    <script type="text/javascript">
        function add(valueToAdd, field){
        	var currentValue = document.getElementById(field).value;
            currentValue = parseInt(currentValue) + parseInt(valueToAdd);
            if(currentValue < 0) {

            }
            else {
				document.getElementById(field).value = currentValue;
            }
        };
    </script>
</html>