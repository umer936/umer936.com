<?php
include_once 'header.php';
?>
<style>
    .hero_image {
        background: url('/images/newer/umers_assets-2_g1734.svg') center/cover;
        padding-top: 8rem;
        padding-bottom: 8rem;
    }
</style>

    <div>
        <div class="hero_image">
            <div class="col-12">
                <div class="py-5">
                    <a class="col btn btn-lg btn-primary fw-bold m-1 ms-3" href="#contact">contact me!</a>
                    <a class="col btn btn-lg btn-outline-info fw-bold m-1 ms-2 d-none d-md-inline"
                       onclick="if (!window.__cfRLUnblockHandlers) return false;
                   alert('use arrow keys and spacebar');
        var KICKASSVERSION='2.0';var s = document.createElement('script');
        s.type='text/javascript';document.body.appendChild(s);s.src='//hi.kickassapp.com/kickass.js';
        void(0);">
                        <noscript>enable scripts for a game</noscript>
                        destroy page???
                    </a>
                </div>
            </div>
            <div style="margin-top: 4rem !important;padding: 3rem !important;">
            </div>
<!--            <div class="col-4 rounded border border-2">-->
<!---->
<!--            </div>-->
        </div>
    </div>

    <div class="row m-0">
        <div class="container p-3 text-center custom-text-container">
        <span class="fw-bold text-center">
            <span class="custom-wrap"><span class="section-pipe" id="hidden-pipe">|</span>CODER</span>
            <span class="custom-wrap"><span class="section-pipe">|</span>PROGRAMMER</span>
            <span class="custom-wrap"><span class="section-pipe">|</span>DESIGNER</span>
        </span>
        </div>
    </div>

    <h2 class="<?= $sectionHeaderClasses ?>">
        Find me
    </h2>

    <div class="container text-center fw-light fs-2 p-2 my-2 container rounded w-75 svg-section-background m-auto"
         style="color: var(--primary-color); background-image: url('/images/newer/section_bg_g194.svg')">
        <div class="row d-flex flex-wrap justify-content-center">
            <a class="social-link col" href="https://instagram.com/umer936?ref=badge">
                <img class="social-logo"
                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/132px-Instagram_logo_2016.svg.png"
                     alt="Instagram"></a>
            <a class="social-link col" href="https://stackoverflow.com/users/2646359/umer936">
                <img class="social-logo"
                     src="https://www.vectorlogo.zone/logos/stackoverflow/stackoverflow-icon.svg"
                     alt="Stack Overflow"></a>
            <a class="social-link col" href="https://7cupsoftea.com/@umer936/">
                <img class="social-logo"
                     src="https://d37v7cqg82mgxu.cloudfront.net/img/link-to-us/square/7cups-logo-text-tile.png"
                     alt="7 Cups of Tea"></a>
            <a class="social-link col" href="https://forum.xda-developers.com/m/umer936.4704799/">
                <img class="social-logo"
                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Xda_logo.svg/512px-Xda_logo.svg.png"
                     alt="XDA Developers Forum"></a>
            <a class="social-link col" href="https://www.reddit.com/user/Umer936/">
                <img class="social-logo"
                     src="https://upload.wikimedia.org/wikipedia/en/b/bd/Reddit_Logo_Icon.svg"
                     alt="Reddit"></a>
            <a class="social-link col" href="https://github.com/umer936">
                <img class="social-logo"
                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/GitHub_Invertocat_Logo.svg/240px-GitHub_Invertocat_Logo.svg.png"
                     alt="GitHub"></a>
            <a class="social-link col" href="https://socialcu.be/@umer936">
                <img class="social-logo"
                     src="https://socialcu.be/Images/cube_icon_web_min.svg"
                     alt="SocialCube"></a>
        </div>
    </div>


    <h2 class="<?= $sectionHeaderClasses ?>">
        My works
    </h2>

    <style>
        .btn-svg-bg {
            background-image: url("/images/newer/btn_bg_g33.svg");
            text-shadow: 3px 3px 1px black;
        }

        .btn-svg-bg-1 {
            background-image: url("/images/newer/btn_bg_2_g115.svg");
            text-shadow: 3px 3px 1px black;
        }

        .btn-svg-bg-2 {
            background-image: url("/images/newer/btn_bg_3_g80.svg");
            text-shadow: 3px 3px 1px black;
        }

        .btn-svg-bg-3 {
            background-image: url("/images/newer/umers_assets-2_g43.svg");
            text-shadow: 3px 3px 1px black;
        }

        .btn-svg-bg-4 {
            background-image: url("/images/newer/umers_assets-2_g48.svg");
            text-shadow: 3px 3px 1px black;
        }
    </style>

    <div class="container p-1">
    <div class="text-center fs-4" style="font-family: 'Play', sans-serif">
        <button id="shuffleButton" class="btn svg-header-background btn-svg-bg-3 fs-3 py-0 m-2">🔀 Shuffle</button>
        <button id="filterClearButton" class="btn svg-header-background btn-svg-bg-4 fs-3 py-0 m-2">Clear filters</button>
    </div>
        <div class="text-center fs-4" style="font-family: 'Play', sans-serif">

            <?php
            $allCategories = [
                    3 => ['colorClasses' => 'svg-header-background btn-svg-bg-2', 'text' => 'Work'],
                    4 => ['colorClasses' => 'svg-header-background btn-svg-bg-1', 'text' => 'Software'],
                    5 => ['colorClasses' => 'svg-header-background btn-svg-bg-2', 'text' => 'College'],
                    6 => ['colorClasses' => 'svg-header-background btn-svg-bg-1', 'text' => 'Robotics'],
                    7 => ['colorClasses' => 'svg-header-background btn-svg-bg-1', 'text' => 'In-prog'],
                    8 => ['colorClasses' => 'svg-header-background btn-svg-bg-1', 'text' => 'Completed'],
            ];


            foreach ($allCategories as $categoryId => $category) {
                $colorClasses = $category['colorClasses'];
                $text = $category['text'];
                echo "<input type=\"checkbox\" class=\"btn-check\" data-category-id='$categoryId' id=\"btn-check-$categoryId\" autocomplete=\"off\">";
                echo "<label class=\"btn fs-3 py-0 m-2 $colorClasses\" for=\"btn-check-$categoryId\">$text</label>";
            }
            ?>

        </div>
    </div>

    <div id="yearSlider" class="container svg-section-background col-9 mx-auto my-4 px-4 py-3">
        <label for="yearRange" class="form-label">Filter by year: <span id="yearSelected"></span></label>
        <input type="range" class="form-range emoji-slider" min="2014" max="2023" id="yearRange">
    </div>

    <div class="container my-2">
        <div id="noItemsMessage" class="d-none bg-success-subtle text-center">No projects after filter :(</div>
        <?php
        include_once 'projects.php';
        ?>
    </div>


    <h2 class="<?= $sectionHeaderClasses ?>">
        Contact
    </h2>
<?php
include_once 'contact.php';
?>

<?php

include_once 'footer.php';
