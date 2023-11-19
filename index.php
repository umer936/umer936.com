<?php
include_once 'header.php';
?>
    <div class="hero_image">
        <div class="col-12">
            <div class="py-3">
                <div class="p-2 m-3 col-8 col-md-6 col-lg-4 fs-5 rounded border border-2" style="background: #22153fba">
                    Umer Salman is a computer scientist and robotics engineer. He has expertise in many domains,
                    including autonomous aerial robotics, cybersecurity, and full-stack web development.
                    He holds a B.S. in ECE from UT Austin and is employed at Southwest Research Institute.
                </div>
                <a class="col btn btn-lg btn-site fw-bold m-1 ms-3 d-inline" href="#contact">contact me!</a>
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

    <div class="container py-1 text-center">
        <?php
        $btnClasses = "btn btn-site fs-4 py-0 m-2";
        ?>
        <button id="shuffleButton" class="<?= $btnClasses ?>">🔀 Shuffle</button>
        <button id="filterClearButton" class="<?= $btnClasses ?>">Clear filters</button>
        <?php
        $allCategories = [
                3 => ['text' => 'Work'],
                4 => ['text' => 'Software'],
                5 => ['text' => 'College'],
                6 => ['text' => 'Robotics'],
                7 => ['text' => 'In-prog'],
                8 => ['text' => 'Completed'],
        ];

        foreach ($allCategories as $categoryId => $category) {
            $colorClasses = $category['colorClasses'];
            $text = $category['text'];
            echo "<input type=\"checkbox\" class=\"btn-check\" data-category-id='$categoryId' id=\"btn-check-$categoryId\" autocomplete=\"off\">";
            echo "<label class=\"$btnClasses btn-checkboxes\" for=\"btn-check-$categoryId\">$text</label>";
        }
        ?>

        <script>
            document.querySelectorAll('.btn-checkboxes')
                .forEach(btnCheckbox => btnCheckbox.addEventListener('click', function () {
                    btnCheckbox.classList.toggle('active');
                }));
        </script>
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
