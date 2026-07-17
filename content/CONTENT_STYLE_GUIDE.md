# Content Style Guide

Use this guide when adding or editing entries in `content/content_catalog.php`.

## Purpose

- `projects`: portfolio highlights (what was built and why it matters)
- `posts`: your authored writeups in `blog/posts/*.md`
- `media`: external coverage, talks, interviews, or press in `blog/medias/*.md`

## Required Conventions

- Date format is always `MM/DD/YYYY`.
- Project years are always `YYYY-YYYY` (use same year twice if needed).
- Keep one source of truth for long-form details (usually a blog post).
- Keep card text short and specific; avoid repeating full post copy.
- Use one primary call-to-action link per card.

## Field Rules

### `posts` and `media` entries

Each entry should have:

- `url`: markdown filename, kebab-case, `.md`
- `date`: `MM/DD/YYYY`
- `img`: icon or image URL/path
- `smallText`: 1-2 sentence preview (target 120-220 chars)

Optional:

- `imgClasses`: image class overrides (used mainly in `media`)

Example:

```php
'10-Keyless RGB Keyboard' => [
    'url' => 'ee445l-10-keyless-rgb-keyboard.md',
    'date' => '07/17/2026',
    'img' => 'https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/2328.svg',
    'smallText' => 'UT Austin ECE EE445L final project: custom 10-keyless keyboard with RGB backlighting, USB interface, and onboard macro recording.',
],
```

### `projects` entries

Each project should have:

- `title`: short project name
- `text`: concise summary (1-2 sentences)
- `years`: `YYYY-YYYY`
- `categories`: use `ProjectCategory::...` constants

Optional:

- `link`: one primary CTA, e.g. blog post, demo, repo, or talk

Example:

```php
[
    'title' => '10-Keyless RGB Keyboard (EE445L Final Project)',
    'text' => 'UT Austin ECE EE445L Spring 2020 final project with custom hardware, individually addressable RGB backlighting, USB interface, and onboard macro recording.',
    'years' => '2020-2020',
    'categories' => [ProjectCategory::COLLEGE, ProjectCategory::SOFTWARE, ProjectCategory::HARDWARE, ProjectCategory::COMPLETED],
    'link' => ['title' => 'Full Blog Post', 'link' => '/blog/#10-Keyless%20RGB%20Keyboard'],
],
```

## Blog Markdown Structure (`blog/posts/*.md`)

Recommended structure:

1. `# Title`
2. context line (`Course`, `Dates`, or `Project`)
3. `## Team` (if applicable)
4. `## Overview`
5. `## What We Built`
6. `## Results` or `## Why It Matters`
7. `## Demo` / references

Keep sections skimmable and use bullet points for technical details.

## Quick Publish Checklist

- [ ] Entry is in the correct section (`projects`, `posts`, or `media`)
- [ ] Date format is `MM/DD/YYYY`
- [ ] Project years format is `YYYY-YYYY`
- [ ] Summary is concise and not duplicated across sections
- [ ] Link points to canonical long-form source
- [ ] File names are kebab-case markdown names
- [ ] Optional: run `php -l public_html/content/content_catalog.php`
