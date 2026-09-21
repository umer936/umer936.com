<?php
include_once 'header.php';
require_once 'ProjectCategory.php';
$sectionHeaderClasses = $sectionHeaderClasses ?? 'container fs-1 text-center mt-5 section-header fw-bold';
?>
    <div class="hero_image">
        <div class="col-12" id="hero_image_inset">
            <div class="py-3">
                <div class="p-2 m-3 ms-lg-5 col-8 col-md-6 col-lg-4 fs-5 rounded border border-2" style="background: #22153fba">
                    Umer Salman is a computer scientist and robotics engineer. He has expertise in many domains,
                    including autonomous aerial robotics, cybersecurity, and full-stack web development.
                    He holds a B.S. in ECE from UT Austin and is employed at Southwest Research Institute.
                </div>
                <a class="col btn btn-lg btn-site fw-bold m-1 ms-3 ms-lg-5 d-inline" href="#contact">contact me!</a>
                <a class="col btn btn-lg btn-site fw-bold m-1 ms-2 d-none d-md-inline"
                   onclick="if (!window.__cfRLUnblockHandlers) return false;
                   alert('use arrow keys and spacebar');
        var KICKASSVERSION='2.0';var s = document.createElement('script');
        s.type='text/javascript';document.body.appendChild(s);s.src='//hi.kickassapp.com/kickass.js';
        void(0);">
                    <noscript>enable scripts for a game</noscript>
                    destroy page
                </a>
            </div>
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

    <h2 class="<?= str_replace('mt-5', '', $sectionHeaderClasses) ?>">
        My works
    </h2>

    <?php include_once 'projects.php'; ?>


    <h2 class="<?= $sectionHeaderClasses ?>">
        Contact
    </h2>
<?php
include_once 'contact.php';
?>

<?php

include_once 'footer.php';
