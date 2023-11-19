<?php
include_once '../header.php';

$smallTextLorem = 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.';

$blogPosts = [
        'FIRST' => [
                'url' => 'FIRST.md',
                'date' => '08/15/2023',
                'img' => "https://cpmr-islands.org/wp-content/uploads/sites/4/2019/07/test-600x600.png",
                'smallText' => $smallTextLorem,
        ],
        'FIRST1' => [
                'url' => 'FIRST.md',
                'date' => '08/15/2023',
                'img' => "https://cpmr-islands.org/wp-content/uploads/sites/4/2019/07/test-600x600.png",
                'smallText' => $smallTextLorem,
        ],
        'FIRST2' => [
                'url' => 'FIRST.md',
                'date' => '08/15/2023',
                'img' => "https://cpmr-islands.org/wp-content/uploads/sites/4/2019/07/test-600x600.png",
                'smallText' => $smallTextLorem,
        ],
        'FIRST3' => [
                'url' => 'FIRST.md',
                'date' => '08/15/2023',
                'img' => "https://cpmr-islands.org/wp-content/uploads/sites/4/2019/07/test-600x600.png",
                'smallText' => $smallTextLorem,
        ],
        'FIRST4' => [
                'url' => 'FIRST.md',
                'date' => '08/15/2023',
                'img' => "https://cpmr-islands.org/wp-content/uploads/sites/4/2019/07/test-600x600.png",
                'smallText' => $smallTextLorem,
        ],
        'FIRST5' => [
                'url' => 'FIRST.md',
                'date' => '08/15/2023',
                'img' => "https://cpmr-islands.org/wp-content/uploads/sites/4/2019/07/test-600x600.png",
                'smallText' => $smallTextLorem,
        ],
]
?>

    <div class="<?= $sectionHeaderClasses ?>">
        Blog Posts
    </div>

    <div class="container my-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php

            foreach ($blogPosts as $title => $blogPost) {
                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body row">
                            <img src="<?= $blogPost['img'] ?>"
                                 class="col-md-4"
                                 alt="...">
                            <div class="col-md-8">
                                <h5 class="card-title"
                                    data-bs-toggle="modal"
                                    data-bs-target="#postModal"
                                    data-modal-type="posts"
                                    data-modal-title="<?= $title ?>"
                                    data-modal-url="<?= $blogPost['url'] ?>">
                                    <a href="javascript:void(0)"><?= $title ?></a>
                                </h5>
                                <p class="card-text custom-card-text">
                                    <?= $blogPost['smallText'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary"><?= $blogPost['date'] ?></small>
                        </div>
                    </div>
                </div>
                <?php

            }

            ?>
        </div>
    </div>


<?php
$mediaPosts = [
        'CakeFest-2023' => [
                'url' => 'cakefest2023.md',
                'date' => '09/30/23',
                'img' => "https://cakefest.org/cakefest/img/cakefest-logo.svg",
                'imgClasses' => 'bg-info-subtle',
                'smallText' => 'Conference talk on containerization.
                Covers Queueing methods for long-running processes and working with parts in different programming
                languages. YouTube video available.',
        ],
        'FIRST1' => [
                'url' => 'FIRST.md',
                'date' => '08/15/2023',
                'img' => "https://cpmr-islands.org/wp-content/uploads/sites/4/2019/07/test-600x600.png",
                'smallText' => $smallTextLorem,
        ],
        'FIRST2' => [
                'url' => 'FIRST.md',
                'date' => '08/15/2023',
                'img' => "https://cpmr-islands.org/wp-content/uploads/sites/4/2019/07/test-600x600.png",
                'smallText' => $smallTextLorem,
        ],
        'FIRST3' => [
                'url' => 'FIRST.md',
                'date' => '08/15/2023',
                'img' => "https://cpmr-islands.org/wp-content/uploads/sites/4/2019/07/test-600x600.png",
                'smallText' => $smallTextLorem,
        ],
        'FIRST4' => [
                'url' => 'FIRST.md',
                'date' => '08/15/2023',
                'img' => "https://cpmr-islands.org/wp-content/uploads/sites/4/2019/07/test-600x600.png",
                'smallText' => $smallTextLorem,
        ],
        'FIRST5' => [
                'url' => 'FIRST.md',
                'date' => '08/15/2023',

            
                'img' => "https://cpmr-islands.org/wp-content/uploads/sites/4/2019/07/test-600x600.png",
                'smallText' => $smallTextLorem,
        ],
];
?>


    <div class="<?= $sectionHeaderClasses ?>">
        In the Media
    </div>


    <div class="container my-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php

            foreach ($mediaPosts as $title => $mediaPost) {
                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body row">
                            <img src="<?= $mediaPost['img'] ?>"
                                 class="col-md-4 <?= $mediaPost['imgClasses'] ?? '' ?>"
                                 alt="...">
                            <div class="col-md-8">
                                <h5 class="card-title"
                                    data-bs-toggle="modal"
                                    data-bs-target="#postModal"
                                    data-modal-type="medias"
                                    data-modal-title="<?= $title ?>"
                                    data-modal-url="<?= $mediaPost['url'] ?>">
                                    <a href="javascript:void(0)"><?= $title ?></a>
                                </h5>
                                <p class="card-text custom-card-text">
                                    <?= $mediaPost['smallText'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary"><?= $mediaPost['date'] ?></small>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>


    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal content goes here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var postModal = new bootstrap.Modal(document.getElementById('postModal'), {
                backdrop: 'static',
                keyboard: false
            });

            // Function to open modal based on hash
            function openModalFromHash() {
                const hash = window.location.hash.substring(1); // Get the hash without the '#'
                if (hash) {
                    const title = decodeURI(hash);
                    const button = document.querySelector('[data-modal-title="' + title + '"]');
                    if (button) {
                        button.click();
                    }
                }
            }

            // Handle modal show event
            document.getElementById('postModal').addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget; // Button that triggered the modal
                var title = button.getAttribute('data-modal-title'); // Extract info from data-* attributes
                var type = button.getAttribute('data-modal-type'); // Extract info from data-* attributes
                var url = '/blog/' + type + '/?postName=' + button.getAttribute('data-modal-url');

                this.querySelector('.modal-title').textContent = title;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        this.querySelector('.modal-body').innerHTML = data;
                    })
                    .catch(error => console.error('Error fetching modal content:', error));

                window.history.pushState(null, null, '#' + encodeURI(title));
            });

            document.getElementById('postModal').addEventListener('hide.bs.modal', function () {
                window.history.pushState(null, null, window.location.pathname);
            });

            openModalFromHash();
        });
    </script>
<?php

include_once '../footer.php';
