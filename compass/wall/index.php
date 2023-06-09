<!-- © / (c) umer936 -->
<? include '../ckban.php'; ?>

<meta name="viewport" content="width=device-width">
<meta name="viewport" content="width=240">

<center><link rel="stylesheet" type="text/css" href="ds-css.css" /><title>Wall!</title>
<script type="text/javascript">
window.onload=function() 
{
if (navigator.userAgent.indexOf('Nintendo DSi') == -1) //If the UserAgent is not "Nintendo DSi"
{
location.replace('index-pc.php'); //Redirect to an other page
}
}
</script>

<? 
echo "<FORM action=post.php method='post'>
<textarea name=wally>"; include 'wall.php'; echo "</textarea><br>
    <INPUT type='submit' value='Post'><INPUT TYPE='button' VALUE='Reload Page' onClick='history.go(0)'>

 </FORM>
"; ?>