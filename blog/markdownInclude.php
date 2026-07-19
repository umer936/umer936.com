<?php
require_once __DIR__ . '/../../vendor/autoload.php';

if (!isset($_GET['postName']) || $_GET['postName'] === '') {
	http_response_code(400);
	exit('Missing postName');
}

$postPath = $_GET['postName'];
if (!is_file($postPath) || !is_readable($postPath)) {
	http_response_code(404);
	exit('Post not found');
}

$markdownContent = file_get_contents($postPath);

$parser = new Parsedown();
$htmlContent = $parser->text($markdownContent);

echo $htmlContent;
