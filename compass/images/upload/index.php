<?
include '../../ckban.php'; 
include('../../db.php');
include '../../userrank.php';

$place = "Uploading a File";
 mysql_query("UPDATE users SET lastdoing='$place' WHERE username='" . $_COOKIE['user'] . "'"); 
?>

<form enctype="multipart/form-data" action="uploader.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
Choose a file to upload: <input name="uploadedfile" type="file" accept="image/*" /><br />
Or enter URL: <input name="img_url" id="img_url" type="text" placeholder="http://" /><br />
<input type="submit" value="Upload File" />
</form>