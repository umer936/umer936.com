<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#2b3035" />
    <title>Umer Salman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <link href="/newer.min.css" rel="stylesheet" as="style">

    <?php
    $currentURL = $_SERVER['REQUEST_URI'];
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

    function generateLinkClass($currentURL, $targetURL)
    {
        return ($currentURL === $targetURL) ? 'active' : '';
    }

    function generateLinkStyle($currentURL, $targetURL, $color)
    {
        $style = "color: var(--$color);";
        if ($currentURL === $targetURL) {
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
    $sectionHeaderClasses = "container svg-header-background fs-1 text-center mt-5 section-header fw-bold";
    foreach ($navItems as $url => $item) {
        if ($currentURL === $url) {
            $itemColor = $item['color'];
            $logoLink = "/images/newer/logo_group_g464-$itemColor.svg";
            ?>
            <style>
                :root {
                    --<?= $itemColor ?>-translucent: <?= calculateTranslucentColor($$itemColor, 0.69) ?>;
                    --bs-border-color: var(--<?= $itemColor ?>-translucent);
                    --bs-btn-active-border-color: var(--<?= $itemColor ?>);
                }

                .card {
                    --<?= $itemColor ?>-translucent: <?= calculateTranslucentColor($$itemColor, 0.29) ?>;
                    --bs-card-border-color: var(--<?= $itemColor ?>-translucent);
                }

                #logo-text {
                    color: var(--<?= $itemColor ?>);
                }
            </style>
            <?php
        }
    }
    ?>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
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
                        <a class="nav-link <?= generateLinkClass($currentURL, $url) ?>"
                           style="<?= generateLinkStyle($currentURL, $url, $item['color']) ?>"
                           href="<?= $url ?>">
                            <?= $item['label'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>
