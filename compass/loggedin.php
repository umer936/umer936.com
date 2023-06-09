Mr. <? echo "" . $_COOKIE['user'] . ""; ?>, You have been logged in. <br>NOTE: if ANYTHING is not working on the site
; message me on Klub... DO NOT make an alt!!!<br>
<? if($_SERVER['HTTP_REFERER']=="http://compass.netau.net/m/iPhone/login.php")
{echo "Press Home. &#40;Upper Left&#41;";} 
elseif ($_SERVER['HTTP_REFERER']=="http://www.compass.netau.net/m/iPhone/login.php"
) {echo "Press Home. &#40;Upper Left&#41;";} else {header('Location: /');} ?>