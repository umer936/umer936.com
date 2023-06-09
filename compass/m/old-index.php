<head>
<title>Mobile Home</title>
<font size=1>
<link rel="stylesheet" type="text/css" href="mobile.css" />
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<link rel="apple-touch-icon" href="apple-touch-icon.png"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<script type="text/javascript" src="bookmark_bubble.js"></script>
<script type="text/javascript" src="example.js"></script>
<script>
var myLinks = document.getElementsByTagName('a');
for(var i = 0; i < myLinks.length; i++){
   myLinks[i].addEventListener('touchstart', function(){this.className = "hover";}, false);
   myLinks[i].addEventListener('touchend', function(){this.className = "";}, false);
}
window.addEventListener('load', function() {
    setTimeout(scrollTo, 0, 0, 1);
}, false);
</script>
</head>
<?php
$user = $_COOKIE['user']; 
include('../db.php');
$place = "Mobile Homepage";  
include('../update.php');  ?>
<body orient="landscape">
<center>
<div id="content">
<? if($user=="") { 
?>
We have bad news.YOU AREN'T LOGGED IN!
<? 
  } else {echo "<b>You are logged in as $user</b>";} ?>
<hr>
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
					<font size=2 style="position:absolute; top:2px; left: 50px;">Not a member yet? Sign Up!</font>			
					<label for="signup"><font color=red>*</font>Username:</label>
					<input class="field" type="text" name="username" id="username" value="" size="20" /><br>
					<label class="grey" for="password"><font color=red>*</font>Password:</label>
					<input class="field" type="password" name="password" /><br>
					<label class="grey" for="mail">eMail:</label>
					<input class="field" type="text" name="email" id="email" size="23" /><br>
					<label><font color=red>*</font>=Required</label>
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>


</div>

<? 
  } else {echo "<b>Settings | <a href=/profiles/?user=" . $_COOKIE['user'] . ">My Profile</a> | <a href=/logout.php>Logout</a></b><hr>
<a href=/status>Status</a>"; ?>

<script type="text/javascript">
$(document).ready(function() {
$("#ShowOnline").click(function() {
$("#Online").toggle();
});
});
</script>
<a href="/onlineusers.php">Users Online</a>
</div>
</head>
<div id=demo>
blah <br>
<div class="icon left"><br><br><img src=https://www.google.com/intl/en_com/images/srpr/logo3w.png width=100%></div>
<div class="icon middle"><br><br><img src=https://www.google.com/intl/en_com/images/srpr/logo3w.png width=100%></div>
<div class="icon right"><br><br><img src=https://www.google.com/intl/en_com/images/srpr/logo3w.png width=100%>
<div class"clear">
<br></div><br>

<? } ?>
