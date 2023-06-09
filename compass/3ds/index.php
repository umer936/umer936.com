<meta name = "viewport" content = "width = device-width;"><script>   window.scrollBy(40,220);  </script><?php
include('../db.php'); include '../ckban.php'; $place = "On Homepage - 3DS"; include('../update.php'); $user = $_COOKIE['user']; ?><title>3DSCompass - Home</title>
<link rel="stylesheet" type="text/css" href="style.css" /><center>
<script type="text/javascript"
src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script>function change(news,n){if(n==0){document.getElementById('b').innerHTML="<br>pie";document.getElementById('pro').style.visibility='hidden'}else{document.getElementById('b').innerHTML=news;document.getElementById('pro').style.visibility='visible'}}</script>
</div><div id='t'><br><img src='image.png'' width='380' height='80'><br><font size='3px'>Welcome,<font color=ff00ff> <? 
if($user=="") {$user = Guest;} else {echo "";} echo "$user"; 
$result = mysql_query("SELECT * FROM users WHERE username = '$_COOKIE[user]'");while($row = mysql_fetch_array($result)) echo "!</font></font><br>Points: <font color='red'>" . $row['points'] . "</font>
<br>Rank: " . $row['rank'] . " <img id=Avi src=" . $row['Avatar'] . ">"; ?>
<br><br><center></font></div>
<div id=bottom><div id='m'>| <a href="javascript: change('&#60;a href=/status>Status</a>');">Home</a> | <a href=/mail>Mail</a> |
 <a href="javascript: change('&#60;iframe src=online2.php>');">Online Users</a> | News |</div><br>
<div id='b'>
<? if($user=="Guest") { 
?>
<center>
<script type="text/javascript" src="http://w3schools.com/jquery/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#ShowLogin").click(function() {
$("#Login").toggle();
$("#ShowRegister").toggle();
});
});
</script>
<a id="ShowLogin"><b>Member Login</b></a>
<br />
<div id="Login" style="display:none;">
<hr width=50%>
<form action="/login2.php" method="post">
					<label class="grey" for="log">Username:</label>
					<input class="field" name="user" type="text" id="user" value="" size="23" /><br>
					<label class="grey" for="password">Password:</label>
					<input class="field" name="pass" type="password" id="pass" size="23" /><br>
	            	<label><input name="check" id="check" type="checkbox" checked="checked" /> &nbsp;Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
					<a class="lost-pwd" href="/lostpass.php">Lost your password?</a>
				</form>


</div>
<script type="text/javascript">
$(document).ready(function() {
$("#ShowRegister").click(function() {
$("#Register").toggle();
$("#ShowLogin").toggle();
});
});
</script>
<a id="ShowRegister"><b>Register</b></a>
<div id="Register" style="display:none;">
<hr width=50%>
	<form action="/register2.php" method="post">
					<font size=2 style="position:absolute; top:2px; left: 50px;">Not a member yet? Sign Up!</font>			
					<label for="signup"><font color=red>*</font>Username:</label>
					<input class="field" type="text" name="username" id="username" value="" size="23" /><br>
					<label class="grey" for="password"><font color=red>*</font>Password:</label>
					<input class="field" type="password" name="password" /><br>
					<label class="grey" for="mail">eMail:</label>
					<input class="field" type="text" name="email" id="email" size="23" /><br>
					<label><font color=red>*</font>=Required</label><br>
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>


</div>

<? 
  } else {echo "<b>You are logged in</b>
<br>Tap \"Home\" to see the main menu<br><a href=/logout.php><img src=http://goahiska.do.am/Desing/logoutButton.gif></a>";

$cknotif = mysql_num_rows(mysql_query("SELECT * FROM notifications WHERE user='$user' OR user='everyone' ORDER BY id DESC"));
if($cknotif=="0") {echo "<br>";}
else {echo "<br><div id=notifications><strong>Your Notifications</strong><hr>
"; include '../notifications.php'; echo "</div>";}








} ?>


<div id='bb'>Compass</div></div><div id='bbb'><a href='/3ds'>Edit Settings</a></div></div>
</div>