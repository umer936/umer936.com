(function () {
    function parseList(value) {
        return (value || '')
            .split(',')
            .map((part) => part.trim())
            .filter(Boolean);
    }

    function getItemCategories(item) {
        return parseList(item.getAttribute('data-filter-categories'));
    }

    function matchesSelectedCategories(itemCategories, selectedCategories) {
        if (selectedCategories.length === 0) {
            return true;
        }

        return selectedCategories.every((category) => itemCategories.includes(category));
    }

    function getItemYear(item) {
        const yearStart = parseInt(item.getAttribute('data-year-start') || '', 10);
        const yearEnd = parseInt(item.getAttribute('data-year-end') || '', 10);

        if (Number.isNaN(yearStart) || Number.isNaN(yearEnd)) {
            return null;
        }

        return { yearStart, yearEnd };
    }

    function initCollection(block) {
        const grid = block.querySelector('[data-collection-grid]');
        if (!grid) {
            return;
        }

        const itemSelector = block.getAttribute('data-collection-item-selector') || '[data-collection-item]';
        const initialVisibleCount = parseInt(block.getAttribute('data-initial-visible-count') || '0', 10) || 0;
        const hasLoadMore = Boolean(block.querySelector('[data-filter-load-more]'));
        const noResults = block.querySelector('[data-filter-no-results]');
        const loadMoreBtn = block.querySelector('[data-filter-load-more]');
        const shuffleBtn = block.querySelector('[data-filter-shuffle]');
        const clearBtn = block.querySelector('[data-filter-clear]');
        const yearRange = block.querySelector('[data-filter-year]');
        const yearLabel = block.querySelector('[data-filter-year-value]');
        const defaultYear = yearRange ? parseInt(yearRange.getAttribute('data-default-year') || yearRange.max, 10) : null;
        const categoryButtons = Array.from(block.querySelectorAll('[data-filter-category]'));
        const items = Array.from(grid.querySelectorAll(itemSelector));
        const state = {
            selectedCategories: [],
            selectedYear: null,
            visibleCount: initialVisibleCount || items.length,
        };

        function hasActiveFilters() {
            return state.selectedCategories.length > 0 || state.selectedYear !== null;
        }

        function updateNoResults(visibleCount) {
            if (!noResults) {
                return;
            }

            noResults.classList.toggle('d-none', visibleCount !== 0);
        }

        function updateLoadMore() {
            if (!loadMoreBtn) {
                return;
            }

            const shouldHide = hasActiveFilters() || state.visibleCount >= items.length;
            loadMoreBtn.classList.toggle('d-none', shouldHide);
        }

        function syncCategoryButtons() {
            categoryButtons.forEach((button) => {
                const category = button.getAttribute('data-filter-category');
                const isActive = state.selectedCategories.includes(category);
                button.classList.toggle('active', isActive);
                button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });
        }

        function filterItem(item) {
            const itemCategories = getItemCategories(item);
            const categoryMatch = matchesSelectedCategories(itemCategories, state.selectedCategories);

            if (!categoryMatch) {
                return false;
            }

            if (state.selectedYear === null) {
                return true;
            }

            const itemYear = getItemYear(item);
            if (!itemYear) {
                return false;
            }

            return state.selectedYear >= itemYear.yearStart && state.selectedYear <= itemYear.yearEnd;
        }

        function visibleFilter(item) {
            const matchesFilters = filterItem(item);
            if (!matchesFilters) {
                return false;
            }

            if (hasActiveFilters()) {
                return true;
            }

            const itemIndex = parseInt(item.getAttribute('data-collection-index') || '0', 10);
            return itemIndex < state.visibleCount;
        }

        function arrange() {
            if (window.Isotope) {
                const isotope = block.__isotope || new window.Isotope(grid, {
                    itemSelector,
                    percentPosition: true,
                });
                block.__isotope = isotope;
                if (!block.__isotopeListenerAttached) {
                    isotope.on('arrangeComplete', function (filteredItems) {
                        updateNoResults(filteredItems.length);
                        updateLoadMore();
                    });
                    block.__isotopeListenerAttached = true;
                }
                isotope.arrange({ filter: visibleFilter });
                return;
            }

            let visibleCount = 0;
            items.forEach((item) => {
                const shouldShow = visibleFilter(item);
                item.classList.toggle('d-none', !shouldShow);
                if (shouldShow) {
                    visibleCount += 1;
                }
            });
            updateNoResults(visibleCount);
            updateLoadMore();
        }

        if (yearRange && yearLabel) {
            yearLabel.textContent = '';
        }

        categoryButtons.forEach((button) => {
            button.addEventListener('click', function () {
                const category = this.getAttribute('data-filter-category');
                const existingIndex = state.selectedCategories.indexOf(category);

                if (existingIndex >= 0) {
                    state.selectedCategories.splice(existingIndex, 1);
                } else {
                    state.selectedCategories.push(category);
                }

                syncCategoryButtons();
                arrange();
            });
        });

        if (clearBtn) {
            clearBtn.addEventListener('click', function () {
                state.selectedCategories = [];
                state.selectedYear = null;
                state.visibleCount = initialVisibleCount || items.length;

                if (yearRange) {
                    yearRange.value = String(defaultYear ?? yearRange.max);
                }
                if (yearLabel) {
                    yearLabel.textContent = '';
                }

                syncCategoryButtons();
                arrange();
            });
        }

        if (shuffleBtn) {
            shuffleBtn.addEventListener('click', function () {
                if (block.__isotope) {
                    block.__isotope.shuffle();
                }
                updateLoadMore();
            });
        }

        if (yearRange) {
            yearRange.addEventListener('input', function () {
                const selectedYear = parseInt(this.value, 10);
                state.selectedYear = Number.isNaN(selectedYear) ? null : selectedYear;
                if (yearLabel) {
                    yearLabel.textContent = state.selectedYear === null ? '' : String(state.selectedYear);
                }
                arrange();
            });
        }

        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function () {
                state.visibleCount += 4;
                arrange();
            });
        }

        syncCategoryButtons();
        arrange();

        if (hasLoadMore) {
            updateLoadMore();
        }
    }

    function initModal() {
        const modal = document.getElementById('postModal');
        if (!modal || !window.bootstrap) {
            return;
        }

        new bootstrap.Modal(modal, {
            backdrop: 'static',
            keyboard: false,
        });

        function openModalFromHash() {
            const hash = window.location.hash.substring(1);
            if (!hash) {
                return;
            }

            const title = decodeURI(hash);
            const button = document.querySelector('[data-modal-title="' + title + '"]');
            if (button) {
                button.click();
            }
        }

        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (!button) {
                return;
            }

            const title = button.getAttribute('data-modal-title');
            const type = button.getAttribute('data-modal-type');
            const url = '/blog/' + type + '/?postName=' + button.getAttribute('data-modal-url');
            const modalBody = this.querySelector('.modal-body');

            this.querySelector('.modal-title').textContent = title;

            fetch(url)
                .then((response) => response.text())
                .then((data) => {
                    modalBody.innerHTML = data;
                    modalBody.querySelectorAll('a[href]').forEach((link) => {
                        link.setAttribute('target', '_blank');
                        link.setAttribute('rel', 'noopener noreferrer');
                    });
                })
                .catch((error) => console.error('Error fetching modal content:', error));

            window.history.pushState(null, null, '#' + encodeURI(title));
        });

        modal.addEventListener('hide.bs.modal', function () {
            window.history.pushState(null, null, window.location.pathname);
        });

        openModalFromHash();
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-collection]').forEach(initCollection);
        initModal();
    });
})();
