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

    <div class="container fw-light text-center p-5" style="color: var(--blue); font-size: 420%">
        <span class="custom-wrap">
            CODER. PROGRAMMER. DESIGNER.
        </span>
    </div>

    <div class="container fw-light fs-2 text-center pb-4" style="color: var(--primary-color)">
        <a href="https://instagram.com/umer936?ref=badge">
            <span class="sprites sprite-ig"></span></a>
        |
        <a href="https://7cupsoftea.com/@umer936/">
            <span class="sprites sprite-7cups"></span></a>
        |
        <a href="https://socialcu.be/@umer936">
            <span class="sprites sprite-cube2"></span></a>
        |
        <a href="https://github.com/umer936">
            <span class="sprites sprite-github"></span></a>
        |
        <a href="https://www.reddit.com/user/Umer936/">
            <span class="sprites sprite-reddit"></span></a>
        |
        <a href="https://stackoverflow.com/users/2646359/umer936">
            <span class="sprites sprite-stackoverflow"></span></a>
        |
        <a href="https://twitter.com/umer936">
            <span class="sprites sprite-Twitter"></span></a>
        |
        <a href="https://forum.xda-developers.com/member.php?u=4704799">
            <span class="sprites sprite-xda"></span></a>
    </div>

    <div class="container fw-light fs-1 text-center p-3 text-decoration-underline" style="color: var(--primary-color)">
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


    <div class="container fw-light fs-1 text-center p-3 text-decoration-underline" style="color: var(--primary-color)">
        Contact
    </div>
<?php
include_once 'contact.php';
?>

<?php

include_once 'footer.php';
