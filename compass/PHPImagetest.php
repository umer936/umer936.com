<?php
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 7, 14, 1,  'umer936', $text_color);

imagejpeg($im, 'cool.jpg');

imagedestroy($im);
?>