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
<div id="saved">Teams Saved Locally: <br /></div>

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
	<a href=/>Match Scouting</a>  |  <a href=teams.php>View Teams</a>  |  <a href=DefensePicker.php>Defense Picker</a>
	<hr>
	<form id="team" onsubmit="return OnSubmitForm();" method="post">
		Team Number: 
		<input type="number" name="Team_Number">
		<hr>
		<h1>Observations/Questions (Only ask if need to)</h1>
		<br>
		Drivetrain: 
		<br>
		Treads: 
	  	<input type="radio" name="Drivetrain" value="Treads">
	  	<br>
	  	Wheels: 
	  	<input type="radio" name="Drivetrain" value="Wheels">
	  	<br>
	  	Description of drivetrain (type, number, configuration, etc): 
	  	<input type="text" name="Drivetrain_Desc">
	  	<br>
	  	<br>
	  	High Goal:
		<input type="checkbox" value="Yes" name="HighGoal">
	  	<br>
	  	Low Goal:
		<input type="checkbox" value="Yes" name="LowGoal">
		<hr>
	  	Sally Port (from outside):
		<input type="checkbox" value="Yes" name="SallyPort">
	  	<br>
	  	Drawbridge (from outside):
		<input type="checkbox" value="Yes" name="Drawbridge">
		<br>
	  	CDF:
		<input type="checkbox" value="Yes" name="CDF">
	  	<br>
	  	Portcullis:
		<input type="checkbox" value="Yes" name="Portcullis">
	  	<br>
	  	LowBar:
		<input type="checkbox" value="Yes" name="LowBar">
	  	<br>
	  	Climber:
		<input type="checkbox" value="Yes" name="Climber">
		<br>

	  	<hr>
	  	Height (inc units):
		<input type="text" name="Height">
	  	<br>
	  	Weight (inc units):
		<input type="text" name="Weight">
	  	<br>
	  	Width (with bumpers) (inc units):
		<input type="text" name="Width">
	  	<br>
	  	Length (with bumpers) (inc units):
		<input type="text" name="Length">
	  	<br>
	  	<br>
	  	# speeeds: 
	  	<br>
	  	SingleSpeed:  
	  	<input type="radio" name="Shifter" value="1">
	  	<br>
	  	TwoSpeed:
	  	<input type="radio" name="Shifter" value="2">
	  	<br>
	  	ThreeSpeed:
	  	<input type="radio" name="Shifter" value="3">
	  	<br>
<hr>


	  	How well can it play defense on another robot: 
	  	<br>
	  	Will get pushed (mecanums, all omnis): 
	  	<input type="radio" name="PushingPower" value="0">
	  	<br>
	  	Can barely hold its position: 
	  	<input type="radio" name="PushingPower" value="1">
	  	<br>
	  	Can push a bit:
	  	<input type="radio" name="PushingPower" value="2">
	  	<br>
	  	This thing will shove other robots around:
	  	<input type="radio" name="PushingPower" value="3">
	  	<br>
	  	Any other pushing related comments:
	  	<input type="text" name="Pushing">
	  	<br>
	  	<hr>

	  	Number of batteries team brought: 
	  	<button onclick='add("-1", "Pushing");return false;'>-1</button>
	  	<input type="number" name="Pushing" id="Pushing" value="0">
	  	<button onclick='add("1", "Pushing");return false;'>+1</button>
	  	<br>

	  	Would rather shoot or handle defenses?:
	  	<br>
	  	Shoot:
	  	<input type="radio" name="Strat" value="Shoot">
	  	Defenses:
	  	<input type="radio" name="Strat" value="Defensesss">
	  	<br>

	  	Would rather breach or capture?:
	  	<br>
	  	Breach:
	  	<input type="radio" name="Strate2" value="Breach">
	  	Capture:
	  	<input type="radio" name="Strate2" value="Capture">
	  	<br>

	  	Puenatics on robot:
	  	<br>
	  	No:
	  	<input type="radio" name="Puenatics" value="No">
	  	Yes:
	  	<input type="radio" name="Puenatics" value="Yes">
	  	<br>
		<hr>

		<h1>Auton:</h1>
		<br> 
		<textarea name="Auton" style="width: 70%; height: 20%;"></textarea>

		<hr>
		<h1>Comments:</h1>
		<br>
		Write anything that seems important that wasn't above
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
	document.getElementById("team").reset();
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
			$('#team').attr('action', 'pitscoutingquestions2.php');
			if (typeof(usedKey) != "undefined" && usedKey !== null) {
				localStorage.removeItem(usedKey);
			}
			else {
			}
			return true;
		}
		else 
		{
			data = JSON.stringify($("#team").serializeArray());
			localStorage.setItem(document.getElementById('Team_Number').value, data);
			alert('Submitted Locally');
			location.reload();
			return false;
		}
	}
	</script>
</html>