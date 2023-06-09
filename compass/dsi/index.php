<meta name="viewport" content="width=device-width" />
<meta name="viewport" content="width=240" />
<center>
<?php
include '../ckban.php';
$user = $_COOKIE['user']; 
include('../db.php');
$place = "DSi Homepage";  
include('../update.php');  ?>
<link rel="stylesheet" type="text/css" href="style.css" />



<div id="top">
<? if($user=="") { 
?>
NAWT LOGGED IN!
<? 
  } else {echo "<b>You are logged in Mr. $user</b>";} ?>
</div>

</div>



<div id=bottom><? if($user=="") { 
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
					<font size=2 style="position:absolute; top:20px; left: 35px;">Not a member yet? Sign Up!</font>			
					<font color=red>*</font>Username:
					<input class="field" type="text" name="username" id="username" value="" size="15" />
					<label class="grey" for="password"><font color=red>*</font>Password:</label>
					<input class="field" type="password" name="password" /><br>
					<label class="grey" for="mail">eMail:</label>
					<input class="field" type="text" name="email" id="email" size="23" /><br>
					<label><font color=red>*</font>=Required</label>
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>


</div>

<? 
  } else {echo "<font size=4><b>Settings | <a href=/profiles/?user=" . $_COOKIE['user'] . ">My Profile</a> | <a href=/logout.php>Logout</a></b><hr>
<a href=/status>Status</a>"; 

$cknotif = mysql_num_rows(mysql_query("SELECT * FROM notifications WHERE user='$user' OR user='everyone' ORDER BY id DESC"));
if($cknotif=="0") {echo "";}
else {echo "<br><div id=notifications><strong>Your Notifications</strong><hr>
"; include '../notifications.php'; echo "</div>";}









?>


<script type="text/javascript" src="http://w3schools.com/jquery/jquery.js"></script>
<script>document.body.scrollTop = 176;</script>
<script type="text/javascript">
$(document).ready(function() {
$("#ShowOnline").click(function() {
$("#Online").toggle();
});
});
</script>
<a id="ShowOnline">Users Online</a>
<div id="Online" style="display:none;">
<iframe src=/3ds/online2.php width=200 height=100></iframe>
</div>


<? } ?>
</div>