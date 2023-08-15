<?php
include_once '../header.php';
?>


    <div class="container fw-light fs-1 p-3 text-decoration-underline" style="color: var(--primary-color)">
        Blog Posts
    </div>


    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php

            for ($i = 0; $i < 10; $i++) {

            ?>
            <div class="col">
                <div class="card">
                    <div class="card-body row">
                        <img src="https://cpmr-islands.org/wp-content/uploads/sites/4/2019/07/test-600x600.png"
                             class="col-md-4"
                             alt="...">
                        <div class="col-md-8">
                            <h5 class="card-title"><a href="#aaa">Card title</a></h5>
                            <p class="card-text custom-card-text">
                                This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.
                            </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">08/15/2023</small>
                    </div>
                </div>
            </div>
            <?php

            }

            ?>
        </div>
    </div>

<?php

include_once '../footer.php';
