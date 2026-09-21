<?php
$contentItem = $contentItem ?? [];
$contentIndex = $contentIndex ?? 0;
$title = $title ?? ($contentItem['title'] ?? '');
$modalType = $modalType ?? 'posts';
$contentYear = date('Y', strtotime($contentItem['date'] ?? '1970-01-01'));
?>

<div class="col collection-card"
     data-collection-item
     data-collection-index="<?= $contentIndex ?>"
     data-filter-categories="<?= htmlspecialchars(collectionCategoryList($contentItem['categories'] ?? []), ENT_QUOTES) ?>"
     data-year-start="<?= htmlspecialchars($contentYear, ENT_QUOTES) ?>"
     data-year-end="<?= htmlspecialchars($contentYear, ENT_QUOTES) ?>">
    <div class="card h-100">
        <div class="card-body row">
            <?php renderCollectionImage($contentItem['img'], $title, trim('content-card-image ' . ($contentItem['imgClasses'] ?? '')), 'col-4 col-md-4'); ?>
            <div class="col-8 col-md-8">
                <h5 class="card-title"
                    data-bs-toggle="modal"
                    data-bs-target="#postModal"
                    data-modal-type="<?= htmlspecialchars($modalType, ENT_QUOTES) ?>"
                    data-modal-title="<?= htmlspecialchars($title, ENT_QUOTES) ?>"
                    data-modal-url="<?= htmlspecialchars($contentItem['url'], ENT_QUOTES) ?>">
                    <a href="javascript:void(0)"><?= $title ?></a>
                </h5>
                <p class="card-text custom-card-text">
                    <?= $contentItem['smallText'] ?>
                </p>
            </div>
        </div>
        <div class="card-footer d-flex flex-wrap align-items-center gap-1">
            <small class="text-body-secondary me-auto"><?= $contentItem['date'] ?></small>
            <?php renderCollectionCategoryBadges($contentItem['categories'] ?? [], ContentCategory::$ALL); ?>
        </div>
    </div>
</div>
