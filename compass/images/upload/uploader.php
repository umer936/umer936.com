<?

if($_FILES['uploadedfile']['name'] == "")
{
define('ALLOWED_FILENAMES', 'jpg|jpeg|gif|png|bmp|ico|swf|mpo|MPO|JPEG|JPG|ICO|BMP|PNG|GIF|SWF'); 
define('IMAGE_DIR', 'uploads'); 
if(!preg_match('#^http://.*([^/]+\.('.ALLOWED_FILENAMES.'))$#', $_POST['img_url'], $m)) { 
  die('Invalid url given');} 
if(!$img = file_get_contents($_POST['img_url'])) { 
  die('Getting that file failed');} 
if(!file_put_contents(IMAGE_DIR.'/'.$m[1], $img)) { 
  die('Writing the file failed');
}
echo "The file has been uploaded<br>";
}

else {
$target_path = "uploads/";

$filename = $_FILES['uploadedfile']['name'];

if (file_exists("$target_path" . "$filename")) 
{ 
$random_digit=rand(0000,9999);
$target_path = "uploads/$random_digit$filename";
$filename = $random_digit.$filename;
}
else {
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
}

$max_filesize = 999999999999; 
$allowed_filetypes = array('.jpg','.jpeg','.gif','.bmp','.png','.swf','.ico','.mpo','.MPO','.JPEG','.JPG','.GIF','.PNG','.ICO','.SWF');
$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);

if(!in_array($ext,$allowed_filetypes))
    die('The file you attempted to upload is not allowed.');

if(filesize($_FILES['uploadedfile']['tmp_name']) > $max_filesize)
	die('The file you attempted to upload is too large.');

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file $filename has been uploaded<br>
<a href=/images/upload/uploads/$filename> Direct Link </a>";
} 
else{
    echo "There was an error uploading the file, please try again!";
}}