<?php
require_once __DIR__ . '/ProjectCategory.php';
require_once __DIR__ . '/page_elements/collection_helpers.php';

$contentCatalog = require_once __DIR__ . '/content/content_catalog.php';
$projects = $contentCatalog['projects'];
$initialProjectsToShow = 6;
$yearMin = 2014;
$yearMax = (int) date('Y');
$yearDefault = (int) floor(($yearMin + $yearMax) / 2);
?>

<div class="collection-section" data-collection data-initial-visible-count="<?= $initialProjectsToShow ?>">
    <div class="container py-1 text-center collection-controls" data-collection-controls>
        <button id="shuffleButton" class="btn btn-site fs-4 py-0 m-2" type="button" data-filter-shuffle>🔀 Shuffle</button>
        <button id="filterClearButton" class="btn btn-site fs-4 py-0 m-2" type="button" data-filter-clear>Clear filters</button>
        <?php renderCollectionFilterButtons(array_keys(ProjectCategory::$ALL), ProjectCategory::$ALL); ?>
    </div>

    <div id="yearSlider" class="container svg-section-background col-9 mx-auto my-4 px-4 py-3">
        <label for="yearRange" class="form-label">Filter by year: <span id="yearSelected" data-filter-year-value></span></label>
        <input type="range"
               class="form-range emoji-slider"
               min="<?= $yearMin ?>"
               max="<?= $yearMax ?>"
               value="<?= $yearDefault ?>"
               id="yearRange"
               data-default-year="<?= $yearDefault ?>"
               data-filter-year>
    </div>

    <div class="container my-2">
        <div id="noItemsMessage" class="d-none bg-success-subtle text-center" data-filter-no-results>No projects after filter :(</div>
        <div class="row row-cols-2 row-cols-md-3 g-4 mt-2 collection-grid" id="projDiv" data-collection-grid data-collection-item-selector=".projCard">
            <?php
            $projectIndex = 0;
            foreach ($projects as $project) {
                include 'page_elements/proj_bootstrap_card.php';
                $projectIndex++;
            }
            ?>
        </div>
    </div>

    <div class="text-center my-3">
        <button id="loadMoreBtn" class="btn btn-site d-none" type="button" data-filter-load-more>Load More</button>
    </div>
</div>
