<div class="col projCard" data-year="<?= $project['years'] ?>">
    <div class="card h-100">
        <div class="d-flex flex-wrap justify-content-end gap-1 px-2 pt-2">
            <?php
            foreach ($project['categories'] as $categoryKey) {
                ?>
                <span class="badge btn-site"
                      data-category-id="<?= $categoryKey ?>">
                    <?= ProjectCategory::$ALL[$categoryKey]['text'] ?>
                </span>
                <?php
            }
            ?>
        </div>
        <!--  <img src="..." class="card-img-top" alt="...">-->
        <div class="card-body pt-1">
            <h5 class="card-title"><?= $project['title'] ?></h5>
            <p class="card-text">
                <?= $project['text'] ?>
            </p>
        </div>
        <div class="card-footer d-flex flex-wrap align-items-center gap-1">
            <small class="text-muted card-year me-auto"><?= $project['years'] ?></small>
            <?php
            if (isset($project['link'])) {
                ?>
                <a class="small" href="<?= $project['link']['link'] ?>"><?= $project['link']['title'] ?></a>
                <?php
            }
            ?>
        </div>
    </div>
</div>
