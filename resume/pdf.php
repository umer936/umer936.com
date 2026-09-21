<?php
$resumeRoot = realpath(__DIR__ . '/../resume-cv');
if ($resumeRoot === false) {
    http_response_code(404);
    exit('Resume source not found.');
}

$download = isset($_GET['download']);

$pdfPath = null;
$pdfDownloadName = null;

$preferredRootPath = $resumeRoot . DIRECTORY_SEPARATOR . 'Resume.pdf';
if (is_file($preferredRootPath) && is_readable($preferredRootPath)) {
    $pdfPath = $preferredRootPath;
    $pdfDownloadName = basename($preferredRootPath);
}

if ($pdfPath === null) {
    $outputDir = $resumeRoot . DIRECTORY_SEPARATOR . 'output_pdfs';
    if (is_dir($outputDir)) {
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($outputDir, FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $fileInfo) {
            if (!$fileInfo->isFile()) {
                continue;
            }

            $path = $fileInfo->getPathname();
            if (strtolower(pathinfo($path, PATHINFO_EXTENSION)) !== 'pdf') {
                continue;
            }

            $relativePath = substr($path, strlen($resumeRoot) + 1);
            if (strpos($relativePath, 'output_pdfs' . DIRECTORY_SEPARATOR . 'old' . DIRECTORY_SEPARATOR) === 0) {
                continue;
            }

            $pdfPath = $path;
            $pdfDownloadName = basename($path);
            break;
        }
    }
}

if ($pdfPath === null) {
    $fallbacks = glob($resumeRoot . DIRECTORY_SEPARATOR . '*.pdf');
    if ($fallbacks !== false && !empty($fallbacks)) {
        $fallbackPath = $fallbacks[0];
        if (is_file($fallbackPath) && is_readable($fallbackPath)) {
            $pdfPath = $fallbackPath;
            $pdfDownloadName = basename($fallbackPath);
        }
    }
}

if ($pdfPath === null || $pdfDownloadName === null) {
    http_response_code(404);
    exit('Resume PDF not found.');
}

$fileSize = filesize($pdfPath);
if ($fileSize === false) {
    http_response_code(500);
    exit('Could not read resume PDF.');
}

$safeDownloadName = str_replace(array("\\", '"', "\r", "\n"), array('\\\\', '\\"', '', ''), $pdfDownloadName);

header('Content-Type: application/pdf');
header('Content-Length: ' . $fileSize);
header('Content-Disposition: ' . ($download ? 'attachment' : 'inline') . '; filename="' . $safeDownloadName . '"; filename*=UTF-8\'\'' . rawurlencode($pdfDownloadName));
header('X-Content-Type-Options: nosniff');

readfile($pdfPath);
