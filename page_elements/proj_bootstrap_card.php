<?php
$project = $project ?? [];
$projectIndex = $projectIndex ?? 0;
[$projectYearStart, $projectYearEnd] = collectionYearRange($project['years'] ?? '0000-0000');
?>

<div class="col projCard"
     data-collection-item
     data-collection-index="<?= $projectIndex ?>"
     data-filter-categories="<?= htmlspecialchars(collectionCategoryList($project['categories']), ENT_QUOTES) ?>"
     data-year-start="<?= htmlspecialchars($projectYearStart, ENT_QUOTES) ?>"
     data-year-end="<?= htmlspecialchars($projectYearEnd, ENT_QUOTES) ?>">
    <div class="card h-100">
        <?php if (!empty($project['img'])) {
            renderCollectionImage($project['img'], $project['imgAlt'] ?? $project['title'], 'project-card-image');
        } ?>
        <div class="d-flex flex-wrap justify-content-end gap-1 px-2 pt-2">
            <?php renderCollectionCategoryBadges($project['categories'], ProjectCategory::$ALL); ?>
        </div>
        <div class="card-body pt-1">
            <h5 class="card-title"><?= $project['title'] ?></h5>
            <p class="card-text"><?= $project['text'] ?></p>
        </div>
        <div class="card-footer d-flex flex-wrap align-items-center gap-1">
            <small class="text-muted card-year me-auto"><?= $project['years'] ?></small>
            <?php if (isset($project['link'])) { ?>
                <a class="small" href="<?= $project['link']['link'] ?>"><?= $project['link']['title'] ?></a>
            <?php } ?>
        </div>
    </div>
</div>
