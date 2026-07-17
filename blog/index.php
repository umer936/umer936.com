<?php
include_once '../header.php';

$contentCatalog = require_once __DIR__ . '/../content/content_catalog.php';
$blogPosts = $contentCatalog['posts'];
$mediaPosts = $contentCatalog['media'];

// Keep cards in newest-first order without manually reordering the catalog.
uasort($blogPosts, static function ($a, $b) {
    return strtotime($b['date']) <=> strtotime($a['date']);
});
uasort($mediaPosts, static function ($a, $b) {
    return strtotime($b['date']) <=> strtotime($a['date']);
});
?>
    <div class="<?= $sectionHeaderClasses ?>">
        Blog Posts
    </div>

    <div class="container my-4">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php

            foreach ($blogPosts as $title => $blogPost) {
                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body row">
                            <img src="<?= $blogPost['img'] ?>"
                                 class="col-4 col-md-4"
                                 loading="lazy"
                                 alt="...">
                            <div class="col-8 col-md-8">
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
    <div class="<?= $sectionHeaderClasses ?>">
        In the Media
    </div>


    <div class="container my-4">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php

            foreach ($mediaPosts as $title => $mediaPost) {
                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body row">
                            <img src="<?= $mediaPost['img'] ?>"
                                 class="col-4 col-md-4 <?= $mediaPost['imgClasses'] ?? '' ?>"
                                 loading="lazy"
                                 alt="...">
                            <div class="col-8 col-md-8">
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
                <div class="modal-body"><!-- px-5 -->
                    <!-- Modal content goes here -->
                </div>
                <div class="modal-footer d-inline">
<!--                    <span class="float-start">© umer936</span>-->
<!--                    <button type="button" class="btn btn-secondary btn-sm float-end" data-bs-dismiss="modal">Close</button>-->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new bootstrap.Modal(document.getElementById('postModal'), {
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
                var modalBody = this.querySelector('.modal-body');

                this.querySelector('.modal-title').textContent = title;


                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        modalBody.innerHTML = data;

                        // Keep users on the blog page when opening external references.
                        modalBody.querySelectorAll('a[href]').forEach(link => {
                            link.setAttribute('target', '_blank');
                            link.setAttribute('rel', 'noopener noreferrer');
                        });
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
