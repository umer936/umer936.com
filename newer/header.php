<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Umer Salman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        :root {
            --darkgray: #333333;
            --gray: #4D4D4D;
            --lightgray: #999999;

            --green: #C2E15F;
            --orange: #FDA333;
            --purple: #D3A4F9;
            --red: #FB4485;
            --blue: #6CE0F1;
            --yellow: #FFEB3D;
            --lightblue: #00B9F2;
            --pink: #FB3199;
            --lightorange: #BF8040;

            --primary-color: #39B7CD;
            --secondary-color: #00CDCD;
        }

        .sprites {
            background:url(../images/sprites.png) no-repeat;
            text-indent:100%;
            overflow:hidden;
            display:inline-block
        }
        .sprite-Twitter {
            background-position:0 0
        }
        .sprite-7cups {
            background-position:0 -114px
        }
        .sprite-cube2 {
            background-position:0 -228px
        }
        .sprite-github {
            background-position:0 -342px
        }
        .sprite-gplus-64 {
            background-position:0 -456px
        }
        .sprite-ig {
            background-position:0 -570px
        }
        .sprite-reddit {
            background-position:0 -684px
        }
        .sprite-stackoverflow {
            background-position:0 -798px
        }
        .sprite-xda {
            background-position:0 -912px;
            width:63px
        }
        .sprite-Twitter,
        .sprite-7cups,
        .sprite-cube2,
        .sprite-github,
        .sprite-gplus-64,
        .sprite-ig,
        .sprite-reddit,
        .sprite-stackoverflow,
        .sprite-xda {
            width:64px;
            height:64px
        }

        .custom-card-text {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3; /* Number of lines to show */
            overflow: hidden;
            text-overflow: ellipsis;
        }


        .custom-wrap {
            overflow-wrap: normal; /* Prevents word break until word is wider than container */
        }

        @media (max-width: 576px) {
            .custom-wrap {
                overflow-wrap: break-word; /* Enable word break on small screens */
            }
        }
    </style>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/newer">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img src="/images/logoh.png"
                         width="48"
                         height="48"
                         alt="umer936 Logo">
                </div>
                <div class="col">
                    Umer Salman
                    <br>
                    Umer936
                </div>
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
