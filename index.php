<?php
include_once 'header.php';
?>

    <div class="container py-5">
        <div class="row border p-4">
            <div class="col-8">
                <img height="100px">
                <div class="row">
                    <a class="col btn btn-primary mx-3 fw-bold" href="#contact">contact me!</a>
                    <a class="col btn btn-outline-primary mx-3 fw-bold d-none d-sm-block"
                       onclick="if (!window.__cfRLUnblockHandlers) return false;
            var KICKASSVERSION='2.0';var s = document.createElement('script');
            s.type='text/javascript';document.body.appendChild(s);s.src='//hi.kickassapp.com/kickass.js';
            void(0);">
                        <noscript>enable scripts for a game</noscript>
                        destroy this page
                    </a>

                </div>
            </div>
            <div class="col-4 rounded border border-2">

            </div>
        </div>
    </div>

<div class="row m-0">
    <div class="container p-3 text-center" style="color: var(--blue); font-size: 420%">
        <span class="fw-bold text-center" style="font-family: Quicksand">
            <span class="custom-wrap"><span class="section-pipe" id="hidden-pipe">|</span>CODER</span><span class="custom-wrap"><span class="section-pipe">|</span>PROGRAMMER</span><span class="custom-wrap"><span class="section-pipe">|</span>DESIGNER</span>
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
    </style>

    <div class="container p-1">
        <div class="text-center fs-4" style="font-family: 'Play', sans-serif">
            <button id="shuffleButton" class="btn fs-3 py-0 svg-header-background btn-svg-bg">🔀 Shuffle</button>

            <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off">
            <label class="btn fs-3 py-0 svg-header-background btn-svg-bg-2" for="btn-check">Work</label>

            <input type="checkbox" class="btn-check" id="btn-check-2" autocomplete="off">
            <label class="btn fs-3 py-0 svg-header-background btn-svg-bg-1" for="btn-check-2">Software</label>

            <input type="checkbox" class="btn-check" id="btn-check-3" autocomplete="off">
            <label class="btn fs-3 py-0 svg-header-background btn-svg-bg-2" for="btn-check-3">College</label>

            <input type="checkbox" class="btn-check" id="btn-check-4" autocomplete="off">
            <label class="btn fs-3 py-0 svg-header-background btn-svg-bg-1" for="btn-check-4">Robotics</label>

            <input type="checkbox" class="btn-check" id="btn-check-5" autocomplete="off">
            <label class="btn fs-3 py-0 svg-header-background btn-svg-bg-1" for="btn-check-5">In-prog</label>

            <input type="checkbox" class="btn-check" id="btn-check-6" autocomplete="off">
            <label class="btn fs-3 py-0 svg-header-background btn-svg-bg-1" for="btn-check-6">Completed</label>

            <input type="checkbox" class="btn-check" id="btn-check-7" autocomplete="off">
            <label class="btn fs-3 py-0 svg-header-background btn-svg-bg-1" for="btn-check-7">Milestoned</label>

            <input type="checkbox" class="btn-check" id="btn-check-8" autocomplete="off">
            <label class="btn fs-3 py-0 svg-header-background btn-svg-bg-1" for="btn-check-8">TODO</label>
        </div>
    </div>



    <div id="yearSlider" class="container svg-section-background col-9 mx-auto my-4 px-4 py-3">
        <label for="yearRange" class="form-label">Filter by year: <span id="yearSelected"></span></label>
        <input type="range" class="form-range emoji-slider" min="2014" max="2023" id="yearRange">
    </div>

    <script>
        document.querySelector('#yearRange').addEventListener('input', function () {
            document.querySelector('#yearSelected').textContent = this.value;
        });
    </script>

    <style>
        #yearSlider {
            font-family: Quicksand;
            background-image: url('/images/newer/section_bg_g194.svg');
        }

        .emoji-slider::-webkit-slider-thumb {
            width: 30px;
            height: 30px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle">📅</text></svg>') center/contain no-repeat;
            border: none;
            appearance: none;
            cursor: pointer;
        }

        .emoji-slider::-moz-range-thumb {
            width: 30px;
            height: 30px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle">📅</text></svg>') center/contain no-repeat;
            border: none;
            appearance: none;
            cursor: pointer;
        }

        .emoji-slider::-ms-thumb {
            width: 30px;
            height: 30px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle">📅</text></svg>') center/contain no-repeat;
            border: none;
            appearance: none;
            cursor: pointer;
        }

        .emoji-slider::-webkit-slider-runnable-track {
            background: var(--purple);
        }

        .emoji-slider::-moz-range-track {
            background: var(--purple);
        }

        .emoji-slider::-ms-track {
            background: var(--purple);
        }
    </style>


    <div class="container my-2">
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
