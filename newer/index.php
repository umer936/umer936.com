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
                       onclick="
                        var KICKASSVERSION='2.0';var s = document.createElement('script');
                        s.type='text/javascript';document.body.appendChild(s);s.src='//hi.kickassapp.com/kickass.js';
                        void(0);">
                        destroy this page
                    </a>
                </div>
            </div>
            <div class="col-4 rounded border border-2">

            </div>
        </div>
    </div>

    <div class="container fw-light text-center p-3" style="color: var(--blue); font-size: 420%">
        <span class="fw-bold col-12" style="font-family: Quicksand">
            <span class="custom-wrap"><span class="section-pipe" id="hidden-pipe">|</span>CODER</span><span class="custom-wrap"><span class="section-pipe">|</span>PROGRAMMER</span><span class="custom-wrap"><span class="section-pipe">|</span>DESIGNER</span>
        </span>
    </div>
    <br>

    <div class="container text-center fw-light fs-2 p-2 my-2" style="color: var(--primary-color)">
        <div class="row d-flex flex-wrap justify-content-center">
            <a class="social-link col" href="https://instagram.com/umer936?ref=badge">
                <img class="social-logo"
                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/132px-Instagram_logo_2016.svg.png"
                     alt="Instagram"></a>
            <a class="social-link col" href="https://7cupsoftea.com/@umer936/">
                <img class="social-logo"
                     src="https://d37v7cqg82mgxu.cloudfront.net/img/active-listeners-therapy.svg"
                     alt="7 Cups of Tea"></a>
            <a class="social-link col" href="https://socialcu.be/@umer936">
                <img class="social-logo"
                     src="https://socialcu.be/Images/cube_icon_web_min.svg"
                     alt="SocialCube"></a>
            <a class="social-link col" href="https://github.com/umer936">
                <img class="social-logo"
                     src="https://upload.wikimedia.org/wikipedia/commons/9/91/Octicons-mark-github.svg"
                     alt="GitHub"></a>
            <a class="social-link col" href="https://www.reddit.com/user/Umer936/">
                <img class="social-logo"
                     src="https://upload.wikimedia.org/wikipedia/en/b/bd/Reddit_Logo_Icon.svg"
                     alt="Reddit"></a>
            <a class="social-link col" href="https://stackoverflow.com/users/2646359/umer936">
                <img class="social-logo"
                     src="https://www.vectorlogo.zone/logos/stackoverflow/stackoverflow-icon.svg"
                     alt="Stack Overflow"></a>
            <a class="social-link col" href="https://forum.xda-developers.com/m/umer936.4704799/">
                <img class="social-logo"
                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Xda_logo.svg/512px-Xda_logo.svg.png"
                     alt="XDA Developers Forum">
            </a>
        </div>
    </div>



    <div class="container fw-light fs-1 text-center p-3 text-decoration-underline section-header fw-bold">
        My works
    </div>

    <div class="container p-1">
        <div class="text-center fs-4">
            <input type="checkbox" class="btn-check" id="btn-check-0" autocomplete="off">
            <label class="btn" style="background: var(--gray)" for="btn-check-0">🔀 Shuffle</label>

            <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off">
            <label class="btn" style="background: var(--gray)" for="btn-check">Category 1</label>

            <input type="checkbox" class="btn-check" id="btn-check-2" autocomplete="off">
            <label class="btn" style="background: var(--gray)" for="btn-check-2">Category 2</label>

            <input type="checkbox" class="btn-check" id="btn-check-3" autocomplete="off">
            <label class="btn btn-success" for="btn-check-3">Category 3</label>

            <input type="checkbox" class="btn-check" id="btn-check-4" autocomplete="off">
            <label class="btn btn-outline-danger" style="background: var(--gray)" for="btn-check-4">Category 4</label>
        </div>
    </div>

    <div class="container my-2">
        <?php
        include_once 'projects.php';
        ?>
    </div>


    <div class="text-center">
        <button id="loadMoreBtn" class="btn btn-primary">Load More</button>
    </div>


    <div class="container fw-light fs-1 text-center p-3 text-decoration-underline section-header fw-bold">
        Contact
    </div>
<?php
include_once 'contact.php';
?>

<?php

include_once 'footer.php';
