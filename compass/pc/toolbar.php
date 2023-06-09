<!-- stylesheets -->  	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />  	<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
 <!-- PNG FIX for IE6 -->  	<!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->	<!--[if lte IE 6]>		<script type="text/javascript" src="js/pngfix/supersleight-min.js"></script>	<![endif]-->	 
<!-- jQuery - the core -->	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>	<!-- Sliding effect -->	<script src="js/slide.js" type="text/javascript"></script>

<script>
function passwordStrength(password)

{

        var desc = new Array();

        desc[0] = "<font color=bloodred>Very Weak</font>";

        desc[1] = "<font color=red>Weak</font>";

        desc[2] = "<font color=yellow>Better</font>";

        desc[3] = "<font color=gold>Medium</font>";

        desc[4] = "<font color=green>Strong</font>";

        desc[5] = "<font color=limegreen>Strongest</font>";



        var score   = 0;



        //if password bigger than 6 give 1 point

        if (password.length > 6) score++;



        //if password has both lower and uppercase characters give 1 point      

        if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;



        //if password has at least one number give 1 point

        if (password.match(/\d+/)) score++;



        //if password has at least one special caracther give 1 point

        if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++;



        //if password bigger than 12 give another 1 point

        if (password.length > 12) score++;



         document.getElementById("passwordDescription").innerHTML = desc[score];

         document.getElementById("passwordStrength").className = "strength" + score;

}</script>


</head>

<body>
<? if ($user=="") { ?>
<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Welcome to PC-Compass!</h1>
				<h2>Please Login!</h2>		
			</div>
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="/login2.php" method="post">
					<h1>Member Login</h1>
					<label class="grey" for="log">Username:</label>
					<input class="field" name="user" type="text" id="user" value="" size="23" />
					<label class="grey" for="password">Password:</label>
					<input class="field" name="pass" type="password" id="pass" size="23" />
	            	<label><input name="check" id="check" type="checkbox" checked="checked" /> &nbsp;Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
					<a class="lost-pwd" href="/lostpass.php">Lost your password?</a>
				</form>
			</div>
			<div class="left right">			
				<!-- Register Form -->
				<form action="/register2.php" method="post">
					<h1>Not a member yet? Sign Up!</h1>				
					<label class="grey" for="signup"><font color=red>*</font>Username:</label>
					<input class="field" type="text" name="username" id="username" value="" size="23" />
					<label class="grey" for="password"><font color=red>*</font>Password:</label>
					<input class="field" type="password" name="password" onkeyup="passwordStrength(this.value)" />
		                        <span id="passwordDescription"></span>
		                        <div id="passwordStrength" class="strength0"><font color=dandilion>*Compass encrypts your passwords, <a href=/sec.php>Learn More</a></font></div>
					<label class="grey" for="mail">eMail:</label>
					<input class="field" type="text" name="email" id="email" size="23" />
					<label><font color=red>*</font>=Required</label>
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>
			</div>
		</div>
</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li>Hello Guest!</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Log In | Register</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel --> 
<? ;} 
else { ?> 
<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Welcome to PC-Compass!</h1>
				<h2>You Are Logged In!</h2>		
			</div>
			<div class="left">
			</div>
			<div class="left right">			
				<!-- Register Form -->
<div style="border: 1px solid silver; height: 250px; overflow-y: scroll; overflow-x: hidden;"><center>
<br><font color=red size=5>Online Users</font><hr>
<? include('../db.php');
$username = $_COOKIE['user']; //Username is IP Address 
$time = time(); //Current time 
$previous = "120"; //Time to check in seconds 
$timeout = $time-$previous; //Timeout=time - 2two minutes 
$query = "SELECT * FROM online WHERE timeout > \"$timeout\""; //Check and see who is online in the last 2 minutes 
$online = mysql_query($query); //Execute query 
$row_online = mysql_fetch_assoc($online); //Grab the users 
if (isset($row_online['username'])) { //If there is atleast one user online 
do { //Do this 
$query1 = "SELECT Avatar FROM users WHERE username='" . $row_online['username'] . "'"; 
$result1 = mysql_query($query1); 
if($result1 == false) 
{ 
   user_error("Query failed: " . mysql_error() . "<br />\n$query1"); 
} 
elseif(mysql_num_rows($result1) == 0) 
{ 
   echo "<p>Guest</p>\n"; 
} 
else 
{ 
   while($query_row = mysql_fetch_assoc($result1)) 
   { 
      foreach($query_row as $key => $avi) 
      { 
         echo ""; 

      } 
      echo "\n"; 
   } 
}
$query12 = "SELECT lastdoing FROM users WHERE username='" . $row_online['username'] . "'"; 
$result12 = mysql_query($query12); 
if($result12 == false) 
{ 
   user_error("Query failed: " . mysql_error() . "<br />\n$query12"); 
} 
elseif(mysql_num_rows($result12) == 0) 
{ 
   echo "<p>Guest</p>\n"; 
} 
else 
{ 
   while($query_row = mysql_fetch_assoc($result12)) 
   { 
      foreach($query_row as $key2 => $doing) 
      { 
         echo ""; 

      } 
      echo "\n"; 
   } 
}
echo "<img src=$avi width=100><br><font color=silver>$doing</font><br>
<A href='/profiles/?user=". $row_online['username'] . "'>" . $row_online['username'] . "</a><br/><br>
<hr>"; //Output username 
} while($row_online = $row_online = mysql_fetch_assoc($online)); //Until all records are displayed 

} else { 
echo "There are no members online."; //Inform user that no one is online... 
} 
?> 
</center></div>
			</div><a href=/logout.php><img src=http://goahiska.do.am/Desing/logoutButton.gif></a>
		</div>
</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<? echo "<li>Hello $user!" ?></li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Toolbar</a>
				<a id="close" style="display: none;" class="close" href="#">Close Toolbar</a>			
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel --> 

<? ;} ?>