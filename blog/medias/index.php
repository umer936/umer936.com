<?php
require_once '../Parsedown.php';

$markdownContent = file_get_contents(htmlspecialchars($_GET['postName']));

$parsedown = new Parsedown();

$htmlContent = $parsedown->text($markdownContent);

echo $htmlContent;
