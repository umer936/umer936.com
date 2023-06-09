
<script language=”javascript”>
var state = ‘none’; function showhide(layer_ref) { if (state == ‘block’) {
state = ‘none’;
}
else {
state = ‘block’;
}
if (document.all) { //IS IE 4 or 5 (or 6 beta)
eval( “document.all.” + layer_ref + “.style.display = state”);
}
if (document.layers) { //IS NETSCAPE 4 or below
document.layers[layer_ref].display = state;
}
if (document.getElementById &&!document.all) {
hza = document.getElementById(layer_ref);
hza.style.display = state;
}
}
</script>



<link href="css/middlestyle.css" rel="stylesheet" type="text/css" />

<img src=/images/PC%20simple.png style="
position:fixed; left: 5px; top: 15px; width: 65%; height: 20%;border-radius: 20px; opacity: 0.8;">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a href=/status><font color=red size=80>Status</a></font>
<div id=news class=boxes>News here</div>

<? 
$user = $_COOKIE['user'];
if (isset($user)) {echo "
<div id=notifications class=boxes><b>Notifications</b><hr>"; 

include '../notifications.php';

echo "</div>";}
else {echo "<div id=nli>You Ish NAWT logged in!<br><a href='#' onclick=\"showhide('nli');\">
<img src=http://www.sierrafoot.org/images/dismiss_button.png></a>
</div>";} ?>






<div class=chat-bubble><div class=chat-bubble-arrow-border></div><div class=chat-bubble-arrow></div>Login Here!</div> 