<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Umer Salman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="/newer/newer.css" rel="stylesheet">
    <link href="https://allfont.net/allfont.css?fonts=agency-fb" rel="stylesheet" type="text/css" />
</head>
<?php
$sectionHeaderClasses = "container svg-header-background fs-1 text-center mt-5 section-header fw-bold";
?>
<body>
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/newer">
            <div class="row align-items-center">
                <img class="col" id="logo-img" src="/images/newer/logo_group_g464.svg" alt="umer936 Logo">
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
        <?php
        $currentURL = $_SERVER['REQUEST_URI'];
        ?>
        <div class="collapse navbar-collapse fw-bold" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-4 gap-2">
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentURL === '/newer/') echo 'active'; ?>"
                       style="color: var(--blue); <?php if ($currentURL === '/newer/') echo 'border-bottom: 5px var(--bs-border-style) var(--blue) !important;'; ?>"
                       href="/newer">
                        home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentURL === '/newer/blog/') echo 'active'; ?>"
                       style="color: var(--red); <?php if ($currentURL === '/newer/blog/') echo 'border-bottom: 5px var(--bs-border-style) var(--red) !important;'; ?>"
                       href="/newer/blog">
                        blog
                    </a>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link"-->
<!--                       style="color: var(--orange)"-->
<!--                       href="https://raw.githubusercontent.com/umer936/My-CV/master/output_pdfs/2020_Resume.pdf">-->
<!--                        résumé -->
<!--                    </a>-->
<!--                </li>-->
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentURL === '/newer/resume/') echo 'active'; ?>"
                       style="color: var(--orange); <?php if ($currentURL === '/newer/resume/') echo 'border-bottom: 5px var(--bs-border-style) var(--orange) !important;'; ?>"
                       href="/newer/resume">
                        résumé
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
