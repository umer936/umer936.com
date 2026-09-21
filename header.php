<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#3C1D5A" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#3C1D5A">
    <meta name="apple-mobile-web-app-title" content="Umer Salman">
    <meta name="author" content="Umer Salman">
    <meta property="og:title" content="Umer Salman (umer936)">
    <meta property="og:description" content="CODER | PROGRAMMER | DESIGNER">
    <meta property="og:image" content="https://umer936.com/images/og-image.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="https://umer936.com">
    <title>Umer Salman</title>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="/newer.min.css" rel="stylesheet" as="style">
    <link href="/assets/css/collections.css" rel="stylesheet" as="style">

    <?php
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
    $navItems = [
            '/' => ['label' => 'home', 'color' => 'blue'],
            '/blog/' => ['label' => 'blog', 'color' => 'red'],
            '/resume/' => ['label' => 'résumé', 'color' => 'orange'],
    ];


    $orange = '#FDA333';
    $purple = '#D3A4F9';
    $red = '#FB4485';
    $blue = '#6CE0F1';
    //        $blue = '#3987CD';

    function generateLinkClass($currentPath, $targetURL)
    {
        return ($currentPath === $targetURL) ? 'active' : '';
    }

    function generateLinkStyle($currentPath, $targetURL, $color)
    {
        $style = "color: var(--$color);";
        if ($currentPath === $targetURL) {
            $style .= "border-bottom: 5px solid var(--$color) !important;";
        }

        return $style;
    }

    function calculateTranslucentColor($colorHex, $opacity)
    {
        list($r, $g, $b) = sscanf($colorHex, "#%02x%02x%02x");

        return "rgba($r, $g, $b, $opacity)";
    }

    $logoLink = '/images/newer/logo_group_g464.svg';
    $sectionHeaderClasses = "container fs-1 text-center mt-5 section-header fw-bold";
    foreach ($navItems as $url => $item) {
        if ($currentPath === $url) {
            $itemColor = $item['color'];
            $logoLink = "/images/newer/logo_group_g464-$itemColor.svg";
            ?>
            <style>
                .card {
                    border-color: <?= calculateTranslucentColor($$itemColor, 0.29) ?>;
                }

                #logo-text {
                    color: <?= $$itemColor ?>;
                }

                .section-header {
                    color: <?= calculateTranslucentColor($$itemColor, 0.85) ?>;
                }
            </style>
            <?php
        }
    }
    ?>
    <link rel="preload" as="image" href="<?= htmlspecialchars($logoLink, ENT_QUOTES) ?>">
    <?php if ($currentPath === '/') { ?>
        <link rel="preload" as="image" href="/images/newer/umers_banner.svg">
    <?php } ?>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg bg-nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <div class="row align-items-center">
                <img class="col" id="logo-img" src="<?= $logoLink ?>" alt="umer936 Logo">
                <div class="col fs-1" id="logo-text">Umer Salman</div>
            </div>
        </a>
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarText"
                aria-controls="navbarText"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse fw-bold" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-4 gap-2">
                <?php foreach ($navItems as $url => $item) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= generateLinkClass($currentPath, $url) ?>"
                           style="<?= generateLinkStyle($currentPath, $url, $item['color']) ?>"
                           href="<?= $url ?>">
                            <?= $item['label'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>
