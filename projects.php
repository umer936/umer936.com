<style>
    #yearSlider {
        font-family: Quicksand;
        background-image: url('/images/newer/section_bg_g194.svg');
    }

    .emoji-slider::-webkit-slider-thumb {
        width: 30px;
        height: 30px;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle">📅</text></svg>') center/contain no-repeat;
        border: none;
        appearance: none;
        cursor: pointer;
    }

    .emoji-slider::-moz-range-thumb {
        width: 30px;
        height: 30px;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle">📅</text></svg>') center/contain no-repeat;
        border: none;
        appearance: none;
        cursor: pointer;
    }

    .emoji-slider::-ms-thumb {
        width: 30px;
        height: 30px;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle">📅</text></svg>') center/contain no-repeat;
        border: none;
        appearance: none;
        cursor: pointer;
    }

    .emoji-slider::-webkit-slider-runnable-track {
        background: var(--purple);
    }

    .emoji-slider::-moz-range-track {
        background: var(--purple);
    }

    .emoji-slider::-ms-track {
        background: var(--purple);
    }
</style>

<div class="row row-cols-2 row-cols-md-3 g-4 mt-2" id="projDiv">
    <?php

    $projects = [
            [
                    'title' => 'a',
                'text' => 'a text',
                'years' => '2019-2020',
                'categories' => [3, 4],
            ],
            [
                    'title' => 'b',
                'text' => 'b text',
                'years' => '2015-2020',
                'categories' => [4],
            ],
            [
                    'title' => 'c',
                'text' => 'c text',
                'years' => '2013-2018',
                'categories' => [3, 4],
                'link' => ['title' => 'YouTube', 'link' => 'https://youtube.com']
            ],
            [
                    'title' => 'd',
                'text' => 'd text',
                'years' => '2013-2020',
                'categories' => [3, 4],
            ],
            [
                    'title' => 'e',
                'text' => 'e text',
                'years' => '2013-2020',
                'categories' => [3, 4],
            ],
    ];


    foreach ($projects as $project) {
        include 'page_elements/proj_bootstrap_card.php';
        ?>


        <?php
    }
    ?>
</div>


<div class="text-center my-3">
    <button id="loadMoreBtn" class="btn btn-primary">Load More</button>
</div>

<script>
    // Define Isotope and related variables
    const projCardsContainer = document.getElementById('projDiv');
    let iso;
    let numProjCardsShown = 3;

    // Initialize Isotope on page load
    document.addEventListener("DOMContentLoaded", function() {
        iso = new Isotope(projCardsContainer, {
            itemSelector: '.projCard',
            percentPosition: true
        });
        // Add an "arrangeComplete" event listener to Isotope
        iso.on('arrangeComplete', function (filteredItems) {
            const noItemsMessage = document.getElementById('noItemsMessage');

            if (filteredItems.length === 0) {
                noItemsMessage.classList.remove('d-none'); // Show the message
            } else {
                noItemsMessage.classList.add('d-none'); // Hide the message
            }
        });
    });

    // "Load More" button click event
    document.querySelector('#loadMoreBtn').addEventListener('click', () => {
        numProjCardsShown += 4;

        // Filter and display the next set of cards
        iso.arrange({
            filter: function (element, index) {
                return index < numProjCardsShown;
            }
        });

        // Relayout Isotope to adjust the layout with the newly displayed cards
        iso.layout();
    });

    // "Shuffle" button click event
    document.getElementById("shuffleButton").addEventListener("click", () => iso.shuffle());

    // Year range filter input event
    document.querySelector('#yearRange').addEventListener('input', function () {
        // Selected year
        const selectedYear = parseInt(this.value);

        // Update the displayed selected year
        document.querySelector('#yearSelected').textContent = selectedYear;

        // Use Isotope to filter based on the selected year
        iso.arrange({
            filter: function (element) {
                // Extract the data-year attribute from the element
                const cardYear = element.getAttribute('data-year');
                if (cardYear) {
                    // Parse the year range
                    const yearRange = cardYear.split('-');
                    const startYear = parseInt(yearRange[0]);
                    const endYear = parseInt(yearRange[1]);

                    // Check if the selected year is within the range
                    return selectedYear >= startYear && selectedYear <= endYear;
                }
                // If data-year attribute is missing or invalid, show the element
                return true;
            },
        });
    });

    // Category filter checkbox click event
    const categoryCheckboxes = document.querySelectorAll('.btn-check');
    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const selectedCategories = [];

            categoryCheckboxes.forEach(cb => {
                if (cb.checked) {
                    selectedCategories.push(parseInt(cb.getAttribute('data-category-id')));
                }
            });

            iso.arrange({
                filter: function (element) {
                    const categoriesInElement = Array.from(element.querySelectorAll('.badge')).map(badge => {
                        return parseInt(badge.getAttribute('data-category-id'));
                    });

                    if (selectedCategories.length === 0) {
                        // Show all items when no categories are selected
                        return true;
                    } else {
                        // Show items that have all the selected categories
                        return selectedCategories.every(category => categoriesInElement.includes(category));
                    }
                },
            });
        });
    });

</script>
