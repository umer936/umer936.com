<div class="col projCard" data-year="<?= $project['years'] ?>">
    <div class="card">
        <div class="position-absolute top-0 end-0">
            <?php
            foreach ($project['categories'] as $category) {
                ?>
                <span class="badge btn-site"
                      data-category-id="<?= $category ?>">
                    <?= $allCategories[$category]['text'] ?>
                </span>
                <?php
            }
            ?>
        </div>
        <!--  <img src="..." class="card-img-top" alt="...">-->
        <div class="card-body">
            <h5 class="card-title"><?= $project['title'] ?></h5>
            <p class="card-text">
                <?= $project['text'] ?>
            </p>
        </div>
        <div class="card-footer">
            <small class="text-muted card-year"><?= $project['years'] ?></small>
            <?php
            if (isset($project['link'])) {
                ?>
                <a class="float-end small" href="<?= $project['link']['link'] ?>"><?= $project['link']['title'] ?></a>
                <?php
            }
            ?>
        </div>
    </div>
</div>
