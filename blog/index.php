<?php
include_once '../header.php';
require_once __DIR__ . '/../page_elements/collection_helpers.php';
require_once __DIR__ . '/../content/ContentCategory.php';
$sectionHeaderClasses = $sectionHeaderClasses ?? 'container fs-1 text-center mt-5 section-header fw-bold';

$contentCatalog = require_once __DIR__ . '/../content/content_catalog.php';
$blogPosts = $contentCatalog['posts'];
$mediaPosts = $contentCatalog['media'];

uasort($blogPosts, static function ($a, $b) {
    return strtotime($b['date']) <=> strtotime($a['date']);
});
uasort($mediaPosts, static function ($a, $b) {
    return strtotime($b['date']) <=> strtotime($a['date']);
});

$blogCategories = collectionSectionCategories($blogPosts, ContentCategory::$ALL);
$mediaCategories = collectionSectionCategories($mediaPosts, ContentCategory::$ALL);
?>
    <div class="<?= $sectionHeaderClasses ?>">
        Blog Posts
    </div>

    <div class="collection-section" data-collection data-initial-visible-count="<?= count($blogPosts) ?>">
        <div class="container py-1 text-center collection-controls">
            <button type="button" class="btn btn-site fs-4 py-0 m-2" data-filter-clear>Clear filters</button>
            <?php renderCollectionFilterButtons($blogCategories, ContentCategory::$ALL); ?>
        </div>

        <div class="container my-4">
            <div class="row row-cols-1 row-cols-md-2 g-4 collection-grid" data-collection-grid data-collection-item-selector=".collection-card">
                <?php
                $contentIndex = 0;
                foreach ($blogPosts as $title => $blogPost) {
                    $contentItem = $blogPost;
                    $modalType = 'posts';
                    include __DIR__ . '/../page_elements/content_card.php';
                    $contentIndex++;
                }
                ?>
            </div>
        </div>
    </div>

    <div class="<?= $sectionHeaderClasses ?>">
        In the Media
    </div>

    <div class="collection-section" data-collection data-initial-visible-count="<?= count($mediaPosts) ?>">
        <div class="container py-1 text-center collection-controls">
            <button type="button" class="btn btn-site fs-4 py-0 m-2" data-filter-clear>Clear filters</button>
            <?php renderCollectionFilterButtons($mediaCategories, ContentCategory::$ALL); ?>
        </div>

        <div class="container my-4">
            <div class="row row-cols-1 row-cols-md-2 g-4 collection-grid" data-collection-grid data-collection-item-selector=".collection-card">
                <?php
                $contentIndex = 0;
                foreach ($mediaPosts as $title => $mediaPost) {
                    $contentItem = $mediaPost;
                    $modalType = 'medias';
                    include __DIR__ . '/../page_elements/content_card.php';
                    $contentIndex++;
                }
                ?>
            </div>
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
                <div class="modal-footer d-inline"></div>
            </div>
        </div>
    </div>
<?php

include_once '../footer.php';
