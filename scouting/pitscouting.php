<? 
if(!$_COOKIE['Scout']) {
	header('Location: setcookie.php');
	exit;
}
else {

}
?>


<html>
<body>
Plz be careful what you upload because this is why we have nice things. You can submit more than one picture by returning to this page. 
Please make the pictures clear and focused so that we can actually see the robot. The more pictures, the better. 
<hr>
<form action="pitscouting2.php" method="post" enctype="multipart/form-data">
	Team Number: 
	<br>
	<input type="number" name="team_number">
    <hr>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <hr>
    <input type="submit" name="submit">
</form>

</body>
</html>
