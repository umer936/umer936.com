<?
include("../../db.php");
$place = "Editing Profile";
include("../../update.php"); ?>
</font>

<script>
function reloadavi()
{
document.getElementById("avi").src=avibox.value;
}
</script>

<?



$user = $_COOKIE['user'];
$pass = hash(SHA512, $_COOKIE['pass']);
$query1 = "SELECT rank FROM users WHERE username='$user' AND password='$pass'"; 
$result1 = mysql_query($query1); 
if($result1 == false) 
{ 
   user_error("Query failed: " . mysql_error() . "<br />\n$query1"); 
} 
elseif(mysql_num_rows($result1) == 0) 
{ 
   echo "<p>Sorry, no rows were returned by your query.</p>\n<meta http-equiv='REFRESH' content='0;url=/'>"; 
} 
else 
{ 
   while($query_row = mysql_fetch_assoc($result1)) 
   { 
      foreach($query_row as $key => $value) 
      { 
         echo ""; 
      } 
      echo "\n"; 
   } 
}



 $user = $_COOKIE['user'];
 $edit = $_GET['edit'];

$q = mysql_query("SELECT * FROM users WHERE username='$user'");


while ($row = mysql_fetch_array($q))
{
 $txt = $row['Bio'];
 echo "Bio:<br/><form method=post action='post.php'>
<textarea name=Bio style=width:300px;height:50px>$txt</textarea><br/><br/>";

 //$signature = $row['Sig'];
 //Echo "<input type=text value='$signature' name='$Sig'><br/><br/>";
}

$qu = mysql_query("SELECT * FROM users WHERE username='$user'");
while ($row = mysql_fetch_array($qu))
{
 $icon = $row['Avatar'];
 $css = $row['CSS'];
 $sig = $row['Sig'];

 if ($row['font']=="")
 {$font = "Black";}
 elseif ($row['font']!="") {$font = $row['font'];}
 if ($row['bg']=="") {$bg = "";}
 elseif ($row['bg']=="none") {$bg = $row['bg'];}
 elseif ($row['bg']!="")  {$bg = $row['bg'];}
 if ($row['url']=="") {$url = "";}
 elseif ($row['url']!="") {$url = $row['url'];}

 echo "
Icon:<br/>
<textarea name=Avatar style=width:300px;height:50px onblur=\"reloadavi();\" id=avibox>$icon</textarea>    
<img src=$icon width=50px height=50px id=avi><br/>
<br/>Signiture:<br /><input type=text name=Sig value='$sig'><br /><br />CSS:<br/><textarea name=CSS style=width:300px;height:50px>$css</textarea>
<br/>
<br/><hr /> 

<br/><br/>
<input type=submit value='Update Profile'></form><br>
<a href=/profiles/?user=$user>Your Profile</a><pre> </pre><a href=/>Home?</a><br><br><br>";
 $bio22 = $_POST['bio'];}
 
 ?>
 <head>
 <title>
 Edit Profile
 </title>
 </head>
