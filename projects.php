<div class="row row-cols-1 row-cols-md-3 g-4 mt-2" id="projDiv">

    <?php

    for ($i = 0; $i < 10; $i++) {
        ?>
        <div class="col projCard">
            <div class="card">
                <p class="number d-none"><?= $i ?></p>
                <div class="position-absolute top-0 end-0">
                    <span class="badge bg-success">Category 3</span>
                    <span class="badge bg-danger">Category 4</span>
                </div>
                <!--  <img src="..." class="card-img-top" alt="...">-->
                <div class="card-body">
                    <h5 class="card-title">Project <?= $i ?></h5>
                    <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to additional
                        content. This content is a little bit longer.
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">2013-2020</small>
                    <a class="float-end small d-none">Link(?): YouTube</a>
                </div>
            </div>
        </div>

        <?php

    }

    ?>
</div>


<div class="text-center my-3">
    <button id="loadMoreBtn" class="btn btn-primary">Load More</button>
</div>

<script>
    const projCardsContainer = document.getElementById('projDiv');
    let iso;
    let numProjCardsShown = 3;

    document.addEventListener("DOMContentLoaded", function() {
        iso = new Isotope(projCardsContainer, {
            itemSelector: '.projCard',
            percentPosition: true
        });
    });

    document.querySelector('#loadMoreBtn').addEventListener('click', () => {
        numProjCardsShown += 4;
        iso.layout();
    });

    document.getElementById("shuffleButton").addEventListener("click", () => iso.shuffle());
</script>
