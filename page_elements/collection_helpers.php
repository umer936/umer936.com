<?php

function collectionCategoryText(array $categoryMap, $categoryId): string
{
    return $categoryMap[$categoryId]['text'] ?? (string) $categoryId;
}

function collectionCategoryList(array $categories): string
{
    return implode(',', array_map('strval', $categories));
}

function collectionSectionCategories(array $items, array $categoryMap, string $categoryKey = 'categories'): array
{
    $foundCategories = [];

    foreach ($items as $item) {
        foreach (($item[$categoryKey] ?? []) as $categoryId) {
            $foundCategories[(string) $categoryId] = true;
        }
    }

    $orderedCategories = [];
    foreach (array_keys($categoryMap) as $categoryId) {
        $categoryId = (string) $categoryId;
        if (isset($foundCategories[$categoryId])) {
            $orderedCategories[] = $categoryId;
        }
    }

    return $orderedCategories;
}

function collectionYearRange(string $years): array
{
    $parts = array_map('trim', explode('-', $years, 2));

    if (count($parts) === 2 && $parts[0] !== '' && $parts[1] !== '') {
        return [$parts[0], $parts[1]];
    }

    return [$years, $years];
}

function renderCollectionCategoryBadges(array $categories, array $categoryMap, string $badgeClass = 'badge btn-site'): void
{
    foreach ($categories as $categoryId) {
        $categoryId = (string) $categoryId;
        ?>
        <span class="<?= htmlspecialchars($badgeClass, ENT_QUOTES) ?>"
              data-category-id="<?= htmlspecialchars($categoryId, ENT_QUOTES) ?>">
            <?= htmlspecialchars(collectionCategoryText($categoryMap, $categoryId), ENT_QUOTES) ?>
        </span>
        <?php
    }
}

function renderCollectionFilterButtons(array $categories, array $categoryMap, string $buttonClass = 'btn btn-site fs-4 py-0 m-2'): void
{
    foreach ($categories as $categoryId) {
        $categoryId = (string) $categoryId;
        ?>
        <button type="button"
                class="<?= htmlspecialchars($buttonClass, ENT_QUOTES) ?>"
                data-filter-category="<?= htmlspecialchars($categoryId, ENT_QUOTES) ?>"
                aria-pressed="false">
            <?= htmlspecialchars(collectionCategoryText($categoryMap, $categoryId), ENT_QUOTES) ?>
        </button>
        <?php
    }
}

function renderCollectionImage(?string $src, string $alt = '', string $class = '', string $wrapperClass = ''): void
{
    if (empty($src)) {
        return;
    }

    $imgClass = trim('img-fluid collection-card-image ' . $class);
    $wrapperClass = trim($wrapperClass);

    if ($wrapperClass === '') {
        ?>
        <img src="<?= htmlspecialchars($src, ENT_QUOTES) ?>"
             class="<?= htmlspecialchars($imgClass, ENT_QUOTES) ?>"
             alt="<?= htmlspecialchars($alt, ENT_QUOTES) ?>"
             loading="lazy"
             decoding="async">
        <?php
        return;
    }

    ?>
    <div class="<?= htmlspecialchars($wrapperClass, ENT_QUOTES) ?>">
        <img src="<?= htmlspecialchars($src, ENT_QUOTES) ?>"
             class="<?= htmlspecialchars($imgClass, ENT_QUOTES) ?>"
             alt="<?= htmlspecialchars($alt, ENT_QUOTES) ?>"
             loading="lazy"
             decoding="async">
    </div>
    <?php
}
