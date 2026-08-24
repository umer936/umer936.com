<?php

// =============================
// CONFIG
// =============================
$SECRET_KEY = 'REPLACE_ME_WITH_A_CHOSEN_KEY';
$TIMEOUT = 10;
$ALLOWED_IPS = [
    // WHITELIST IP addresses here
];

// =============================
// SECURITY HEADERS
// =============================
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// =============================
// GET CLIENT IP
// =============================
$client_ip = $_SERVER['REMOTE_ADDR'];

if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    $client_ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
}

// =============================
// VALIDATE ACCESS (KEY OR IP)
// =============================
$key_provided = isset($_GET['key']) && $_GET['key'] === $SECRET_KEY;
$ip_allowed = in_array($client_ip, $ALLOWED_IPS);

if (!$key_provided && !$ip_allowed) {
    http_response_code(403);
    echo "Forbidden: access denied";
    exit;
}

// =============================
// VALIDATE URL PARAM EXISTS
// =============================
if (!isset($_GET['url'])) {
    http_response_code(400);
    echo "Missing url parameter";
    exit;
}

// =============================
// NORMALIZE URL INPUT
// =============================
$url = trim($_GET['url']);

// Decode once
$url = rawurldecode($url);

// Handle accidental double encoding
if (strpos($url, '%') !== false) {
    $second = rawurldecode($url);
    if (filter_var($second, FILTER_VALIDATE_URL)) {
        $url = $second;
    }
}

// =============================
// VALIDATE URL FORMAT
// =============================
if (!filter_var($url, FILTER_VALIDATE_URL)) {
    http_response_code(400);
    echo "Invalid URL";
    exit;
}

// Only allow http and https
$parsed = parse_url($url);

if (!isset($parsed['scheme']) || !in_array($parsed['scheme'], ['http', 'https'])) {
    http_response_code(400);
    echo "Only HTTP and HTTPS allowed";
    exit;
}

if (!isset($parsed['host'])) {
    http_response_code(400);
    echo "Invalid host";
    exit;
}

// =============================
// BLOCK PRIVATE / LOCAL IPS (SSRF PROTECTION)
// =============================
$host = $parsed['host'];
$ip = gethostbyname($host);

if (
    filter_var(
        $ip,
        FILTER_VALIDATE_IP,
        FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
    ) === false
) {
    http_response_code(403);
    echo "Blocked private or reserved IP";
    exit;
}

// =============================
// CURL REQUEST
// =============================
$ch = curl_init($url);

curl_setopt_array($ch, [
    CURLOPT_NOBODY => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => $TIMEOUT,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_SSL_VERIFYHOST => 2,
]);

curl_exec($ch);

if (curl_errno($ch)) {
    http_response_code(502);
    echo "Connection error: " . curl_error($ch);
    curl_close($ch);
    exit;
}

$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if (!$status) {
    http_response_code(502);
    echo "No response";
    exit;
}

// =============================
// RETURN REAL STATUS
// =============================
http_response_code($status);
echo "HTTP $status";
exit;
