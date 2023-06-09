<!-- © / (c) umer936 -->


<?php
$handle = fopen("wall.php", "w");
fclose($handle);
?><? $post = $_POST['wally']; 
$fp = fopen("wall.php", "w+"); 
fputs($fp, "" . $post . "");
fclose($fp);

header("Location: index.php"); ?>