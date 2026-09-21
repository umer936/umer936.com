<?php
$resumeRoot = realpath(__DIR__ . '/../resume-cv');
if ($resumeRoot === false) {
    http_response_code(404);
    exit('Resume source not found.');
}

$download = isset($_GET['download']);
$trackedFiles = [];
$returnCode = 0;
exec('git -C ' . escapeshellarg($resumeRoot) . ' ls-tree -r --name-only HEAD', $trackedFiles, $returnCode);

if ($returnCode !== 0) {
    http_response_code(500);
    exit('Could not inspect resume repository.');
}

$pdfCandidates = array_values(array_filter($trackedFiles, static function ($path) {
    return preg_match('/\.pdf$/i', $path);
}));

$pdfPath = null;
$pdfDownloadName = null;

$rootLevelCandidates = array_values(array_filter($pdfCandidates, static function ($path) {
    return strpos($path, '/') === false;
}));

if (!empty($rootLevelCandidates)) {
    $preferredRoot = in_array('Resume.pdf', $rootLevelCandidates, true)
        ? 'Resume.pdf'
        : $rootLevelCandidates[0];

    $preferredRootPath = $resumeRoot . DIRECTORY_SEPARATOR . $preferredRoot;
    if (is_file($preferredRootPath) && is_readable($preferredRootPath)) {
        $pdfPath = $preferredRootPath;
        $pdfDownloadName = basename($preferredRootPath);
    }
}

if ($pdfPath === null) {
    $currentOutputCandidates = array_values(array_filter($pdfCandidates, static function ($path) {
        return str_starts_with($path, 'output_pdfs/') && !str_starts_with($path, 'output_pdfs/old/');
    }));

    if (!empty($currentOutputCandidates)) {
        $preferredOutputPath = $resumeRoot . DIRECTORY_SEPARATOR . $currentOutputCandidates[0];
        if (is_file($preferredOutputPath) && is_readable($preferredOutputPath)) {
            $pdfPath = $preferredOutputPath;
            $pdfDownloadName = basename($preferredOutputPath);
        }
    }
}

if ($pdfPath === null && !empty($pdfCandidates)) {
    $fallbackPath = $resumeRoot . DIRECTORY_SEPARATOR . $pdfCandidates[0];
    if (is_file($fallbackPath) && is_readable($fallbackPath)) {
        $pdfPath = $fallbackPath;
        $pdfDownloadName = basename($fallbackPath);
    }
}

if ($pdfPath === null) {
    http_response_code(404);
    exit('Resume PDF not found.');
}

header('Content-Type: application/pdf');
header('Content-Length: ' . filesize($pdfPath));
header('Content-Disposition: ' . ($download ? 'attachment' : 'inline') . '; filename="' . $pdfDownloadName . '"');
header('X-Content-Type-Options: nosniff');

readfile($pdfPath);
