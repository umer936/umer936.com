<?php
$resumeRoot = realpath(__DIR__ . '/../resume-cv');
if ($resumeRoot === false) {
    http_response_code(404);
    exit('Resume source not found.');
}

$download = isset($_GET['download']);
$candidates = [
    $resumeRoot . DIRECTORY_SEPARATOR . 'Resume.pdf',
    $resumeRoot . DIRECTORY_SEPARATOR . 'output_pdfs' . DIRECTORY_SEPARATOR . '2023_Resume.pdf',
];

$pdfPath = null;
foreach ($candidates as $candidate) {
    if (is_file($candidate) && is_readable($candidate)) {
        $pdfPath = $candidate;
        break;
    }
}

if ($pdfPath === null) {
    http_response_code(404);
    exit('Resume PDF not found.');
}

header('Content-Type: application/pdf');
header('Content-Length: ' . filesize($pdfPath));
header('Content-Disposition: ' . ($download ? 'attachment' : 'inline') . '; filename="Resume.pdf"');
header('X-Content-Type-Options: nosniff');

readfile($pdfPath);
