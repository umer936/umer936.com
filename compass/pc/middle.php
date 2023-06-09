<script type="text/javascript">
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
</script>
<link href="css/middlestyle.css" rel="stylesheet" type="text/css" />

<img src=/images/PC%20simple.png style="
position:fixed; left: 5px; top: 15px; width: 65%; height: 20%;border-radius: 20px; opacity: 0.8;">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a href=/status><font color=red size=80>Status</a></font>
<div id=news class=boxes overflow=scroll>News will be here... later...</div>


<?
$user = $_COOKIE['user'];
if (isset($user)) {echo "
<div id=notifications class=boxes><b>Notifications</b><hr>"; 

include '../notifications.php';

echo "</div>";}
else {echo "<div id=nli class=alert><b>WHOA!<br>Dude! You are not logged in!<br>
but don't hit the <img src=http://www.phpbb.com/community/download/file.php?avatar=322293_1183023800.jpg>
button yet, you can fix this problem, easily, by logging in!<br><a href='#' onclick=\"toggle_visibility('nli');\">
<img src=http://www.sierrafoot.org/images/dismiss_button.png></a>
</div>
<div class=chat-bubble><div class=chat-bubble-arrow-border></div><div class=chat-bubble-arrow></div>Login Here!</div> 
";} ?>



