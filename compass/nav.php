<script>if(navigator.userAgent.indexOf('Nintendo 3DS')>-1){location.replace('/3ds'); exit();}</script>
<script>if(navigator.userAgent.indexOf('Nintendo DSi')>-1){location.replace('/dsi'); exit();}</script>
<script>if((navigator.userAgent.indexOf('iPhone')!=-1)||(navigator.userAgent.indexOf('iPod')!=-1))
{document.location="/m/"; exit();}</script>
<script type="text/javascript">
if(screen.width < 600){
window.location = "/m";
}
else if(screen.width > 800){
window.location = "/pc";
}
else if(screen.width < 800 && screen.width > 600){
window.location = "/tab";
}
</script>

<? include 'testhome2.php'; 

$useragent = $_SERVER['HTTP_USER_AGENT'];

if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod')) {
    header('Location: /m/');
    exit();
}
?>

