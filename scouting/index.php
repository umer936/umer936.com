<html manifest = "cache.manifest">
<script src="tablesorter/jquery-latest.js"></script>
<? 
if(!$_COOKIE['Scout']) {
	header('Location: setcookie.php');
	exit;
}
else {

}
?>

<title>Scouting</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
	br {padding: 5%;}
	#saved {position: absolute; right: 0px; top: 0px;}
</style>
<!--div id="status"></div-->
<div id="saved">Matches Saved Locally: <br /></div>

<script>
$(document).ready(function () {
	if (typeof(Storage) !== 'undefined')
	{
		for(var i = 0, len = localStorage.length; i < len; i++) {
			var key = localStorage.key(i);
			var value = localStorage[key];
			$("#saved").append("<span id=" + key + " onclick='Populate(" + key + ");'>" + key + "</span><br />");
		}
	}
	else 
	{
		alert('Bad Browser');
	}
});
</script>
<!--script>
	online = navigator.onLine;
	var statusElem = document.getElementById('status')

	setInterval(function () {
		statusElem.className = navigator.onLine ? 'online' : 'offline';
		statusElem.innerHTML = navigator.onLine ? 'online' : 'offline';  
	}, 250);
</script-->
<body>
	<a href=pitscouting.php>Pit Scouting</a>  |  <a href=teams.php>View Teams</a>  |  <a href=DefensePicker.php>Defense Picker</a>
	<hr>
	<form id="match" onsubmit="return OnSubmitForm();" method="post">
		Team Number: 
		<input type="number" name="Team_Number">
		<br>
		Match Number: 
		<input type="number" name="Match_Number" id="Match_Number">
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
<div>
	  	Drawbridge: 
	  	<input type="radio" name="A_Defense" value="Drawbridge">
	  	<br>
	  	Moat: 
	  	<input type="radio" name="A_Defense" value="Moat">
	  	<br>
	  	Portcullis: 
	  	<input type="radio" name="A_Defense" value="Portcullis">
	  	<br>
	  	Ramparts: 
	  	<input type="radio" name="A_Defense" value="Ramparts">
	  	<br>
</div>
<div>
	  	Rock Wall: 
	  	<input type="radio" name="A_Defense" value="RockWall">
	  	<br>
	  	RoughTerrain: 
	  	<input type="radio" name="A_Defense" value="RoughTerrain">
	  	<br>	  	
	  	Sally Port: 
	  	<input type="radio" name="A_Defense" value="SallyPort">
	  	<br>
	  	Shovel The Fries: 
	  	<input type="radio" name="A_Defense" value="Shovel">
	  	<br>
</div>
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
<div>
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
</div>
<div>
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
</div>
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
		<textarea name="Comments" style="width: 70%; height: 20%;"></textarea>
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
	<script type="text/javascript">
	function Populate(key)
	{
	document.getElementById("match").reset();
	usedKey = key;

	var store = localStorage.getItem(key);
	var jsn = JSON.parse(store);

	if(store.length === 0) {
		return false;
	}
	for (var i = 0; i < jsn.length; i++) {
		var formInput = jsn[i],
		$el = $("input[name='" + formInput.name + "']"),
		type = $el.attr('type');
		$("textarea").val(formInput.value);

		switch (type) {
			case 'checkbox':
				$el.attr('checked', 'checked');
				break;
			case 'radio':
				$el.filter('[value="'+formInput.value+'"]').attr('checked', 'checked');
				break;
			default:
				$el.val(formInput.value);
			}
		}
	}
	</script>

	<script type="text/javascript">
	function OnSubmitForm()
	{
		online = navigator.onLine;
		if(online)
		{
			$('#match').attr('action', 'submit.php');
			if (typeof(usedKey) != "undefined" && usedKey !== null) {
				localStorage.removeItem(usedKey);
			}
			else {
			}
			return true;
		}
		else 
		{
			data = JSON.stringify($("#match").serializeArray());
			localStorage.setItem(document.getElementById('Match_Number').value, data);
			alert('Submitted Locally');
			location.reload();
			return false;
		}
	}
	</script>
</html>