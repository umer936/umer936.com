<!-- © / (c) umer936 -->

<center><link rel="stylesheet" type="text/css" href="css.css" /><title>Wall!</title>


<? 
echo "<FORM action=post.php method='post'>
<textarea name=wally>"; include 'wall.php'; echo "</textarea><br>
    <INPUT type='submit' value='Post'><INPUT TYPE='button' VALUE='Reload Page' onClick='history.go(0)'>

 </FORM>
"; ?>