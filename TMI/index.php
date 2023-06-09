	<link rel="stylesheet" href="/new/css/main.min.css">

	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="/new/css/materialize.min.css"  media="screen,projection"/>

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<?php
date_default_timezone_set("America/Chicago");
$dow_numeric = date("w");
$last_sunday = strtotime('last Sunday');

$hour = date("H");
if($hour > 15) {
	$today = "Tomorrow";
	++$dow_numeric;
}
else {
	$today = "Today";
}

	// ++$dow_numeric;

$dow_text = date('D', strtotime('+'.$dow_numeric.' day', $last_sunday));
?>
<script type="text/javascript">
   today1 = "<?php echo $today; ?>";
   dow_text = "<?php echo $dow_text; ?>";
</script>
<script type="text/javascript">

  // Original JavaScript code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.

  var today = new Date();
  var expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000); // plus 30 days

  function setCookie(name, value)
  {
    document.cookie=name + "=" + escape(value) + "; path=/; expires=" + expiry.toGMTString();
  }

</script>
<script type="text/javascript">

  function storeValues(form)
  {
    setCookie("period1", form.period1.value);
    setCookie("period2", form.period2.value);
    setCookie("period3", form.period3.value);
    setCookie("period4", form.period4.value);
    setCookie("period5", form.period5.value);
    setCookie("period6", form.period6.value);
    setCookie("period7", form.period7.value);
    setCookie("type", form.type.value);
    return true;
  }

</script>
<script type="text/javascript">

  // Original JavaScript code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.

  function getCookie(name)
  {
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? unescape(value[1]) : null;
  }

</script>

<body>
<?php
if($_COOKIE['period4']) {
echo "<style>#classesform {display:none;}</style>";
echo "<button id='show' class='btn waves-effect waves-light' onclick=\"document.getElementById('classesform').style.display='block';document.getElementById('show').style.display='none';\">Show Classes Form<i class='mdi-content-send right'></i></button>";
}
else {
	echo "<style>#schedule {display:none;}</style>";
}
?>
<form action="index.php" onsubmit="return storeValues(this);" method="post">
<div class="row" id="classesform">
		    <div class="col s12 m6 l6">
		      <div class="row">
		        <form class="col s12">
		          <div class="row">
		            <div class="input-field col s6">
		              <input id="period1" type="text" class="validate">
		              <label for="period1">1st Period</label>
		            </div>
		          </div>
		          <div class="row">
		            <div class="input-field col s6">
		              <input id="period2" type="text" class="validate">
		              <label for="period2">2nd Period</label>
		            </div>
		          </div>
		          <div class="row">
		            <div class="input-field col s6">
		              <input id="period3" type="text" class="validate">
		              <label for="period3">3rd Period</label>
		            </div>
		          </div>
		          <div class="row">
		            <div class="input-field col s6">
		              <input id="period4" type="text" class="validate">
		              <label for="period4">4th Period</label>
		            </div>
		          </div>
		          <div class="row">
		            <div class="input-field col s6">
		              <input id="period5" type="text" class="validate">
		              <label for="period5">5th Period</label>
		            </div>
		          </div>
		          <div class="row">
		            <div class="input-field col s6">
		              <input id="period6" type="text" class="validate">
		              <label for="period6">6th Period</label>
		            </div>
		          </div>
		          <div class="row">
		            <div class="input-field col s6">
		              <input id="period7" type="text" class="validate">
		              <label for="period7">7th Period</label>
		            </div>
		          </div>
				    <p>
				      <input name="type" type="radio" id="middle" />
				      <label for="middle">Middle School</label>
				    </p>
				    <p>
				      <input name="type" type="radio" id="high" />
				      <label for="high">High School</label>
				    </p>
		          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
		            <i class="mdi-content-send right"></i>
		          </button>
		        </form>
		      </div>
		    </div>
		    </div>
</form>


<script>
period1 = getCookie("period1");
period2 = getCookie("period2");
period3 = getCookie("period3");
period4 = getCookie("period4");
period5 = getCookie("period5");
period6 = getCookie("period6");
period7 = getCookie("period7");
type = getCookie("type");
if(dow_text == "Sun" || dow_text == "Sat") {
	document.write("You Have No Classes "+today1+"!");
}
else if(dow_text == "Mon") {
document.write("<div id=schedule><table class='striped' width='50%'><thead><tr><th data-field='today'>"+today1+"'s Schedule</th></tr></thead><tbody><tr><td>"+period1+"</td></tr><tr><td>"+period2+"</td></tr><tr><td>Chapel</td></tr><tr><td>"+period3+"</td></tr><tr><td>"+period4+"</td></tr><tr><td>Lunch</td></tr><tr><td>"+period5+"</td></tr><tr><td>"+period6+"</td></tr><tr><td>"+period7+"</td></tr></tbody></table></div>");
}
else if(dow_text == "Tue") {
document.write("<div id=schedule><table class='striped' width='50%'><thead><tr><th data-field='today'>"+today1+"'s Schedule</th></tr></thead><tbody><tr><td>"+period1+"</td></tr><tr><td>"+period2+"</td></tr><tr><td>"+period3+"</td></tr><tr><td>"+period4+"</td></tr><tr><td>"+period5+"</td></tr><tr><td>"+period6+"</td></tr><tr><td>"+period7+"</td></tr></tbody></table></div>");
}
else if(dow_text == "Wed") {
document.write("<div id=schedule><table class='striped' width='50%'><thead><tr><th data-field='today'>"+today1+"'s Schedule</th></tr></thead><tbody><tr><td>"+period1+"</td></tr><tr><td>"+period2+"</td></tr><tr><td>"+period3+"</td></tr><tr><td>"+period4+"</td></tr><tr><td>"+period5+"</td></tr><tr><td>"+period6+"</td></tr><tr><td>"+period7+"</td></tr></tbody></table></div>");
}
else if(dow_text == "Thurs") {
document.write("<div id=schedule><table class='striped' width='50%'><thead><tr><th data-field='today'>"+today1+"'s Schedule</th></tr></thead><tbody><tr><td>"+period1+"</td></tr><tr><td>"+period2+"</td></tr><tr><td>"+period3+"</td></tr><tr><td>"+period4+"</td></tr><tr><td>"+period5+"</td></tr><tr><td>"+period6+"</td></tr><tr><td>"+period7+"</td></tr></tbody></table></div>");
}
else if(dow_text == "Fri") {
document.write("<div id=schedule><table class='striped' width='50%'><thead><tr><th data-field='today'>"+today1+"'s Schedule</th></tr></thead><tbody><tr><td>"+period1+"</td></tr><tr><td>"+period2+"</td></tr><tr><td>"+period3+"</td></tr><tr><td>"+period4+"</td></tr><tr><td>"+period5+"</td></tr><tr><td>"+period6+"</td></tr><tr><td>"+period7+"</td></tr></tbody></table></div>");
}
else {
document.write("<div id=schedule><table class='striped' width='50%'><thead><tr><th data-field='today'>"+today1+"'s Schedule</th></tr></thead><tbody><tr><td>"+period1+"</td></tr><tr><td>"+period2+"</td></tr><tr><td>"+period3+"</td></tr><tr><td>"+period4+"</td></tr><tr><td>"+period5+"</td></tr><tr><td>"+period6+"</td></tr><tr><td>"+period7+"</td></tr></tbody></table></div>");
}</script>








	<footer>
	  <div class="footer-copyright">
	    <div class="container">
	    © 2015 Umer936
	    </div>
	  </div>
	</footer>

  	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="/new/js/materialize.min.js"></script>
	<script type="text/javascript" src="/new/js/main.min.js"></script>

</body>
