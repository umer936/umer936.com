<title>Send Mail</title>

<?php
 if (isset($_COOKIE['user']))
 {
 $t = $_GET['to'];
 $su = $_GET['sub'];
 $bod = $_GET['body'];
 echo "<div><form method=post action='post.php'>
 To: <br /><input type=text name=to value='$t'><br/>
 Subject: <br /><input type=text name=sub value='$su'><br/>
 Message:<br /><textarea name=body value='$bod'></textarea>
 <br/>
 <input type=submit value=Send> <input type=button onclick=location.href='/mail' value=Back>
 </div>
</form>";} else {echo "You are not logged in... <br><a href=/>Home?</a>";}
 ?>
<style type="text/css">
textarea {width:400px;height:150px}
div {border:1px solid black;width:410px;left:10px}
</style>
