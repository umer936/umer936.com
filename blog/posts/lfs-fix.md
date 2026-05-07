
# Git + LFS Stuck File or "Not Found": A Quick Fix Guide

If `git pull` fails on an LFS-tracked file, the fastest fix is to verify your remote and LFS endpoint first. In this case, the underlying issue was not the file itself. It was a remote mismatch.

## 1) Fast diagnosis: check remote and LFS endpoint

```bash
git remote -v
git lfs env
```

If those URLs do not point to the same repository, fix the remote before trying resets or stash workflows.

---

## 2) Fix the remote URL first

```bash
git remote set-url origin <correct-repo-url>
```

Then refresh and pull:

```bash
git fetch --all
git pull
```

---

## 3) If one file is still stuck

Reset only the affected file:

```bash
git checkout origin/main -- path/to/file
```

Or reset the branch state:

```bash
git reset --hard origin/main
```

---

## 4) If LFS still behaves inconsistently

Pull without automatic LFS smudge:

```bash
GIT_LFS_SKIP_SMUDGE=1 git pull
```

Then restore LFS content explicitly:

```bash
git lfs pull
git lfs checkout
```

---

## 5) Last resort: clean reset

```bash
git fetch origin
git reset --hard origin/main
git clean -fd
git lfs pull
```

---

## What actually caused the issue

The error chain looked like a broken file state:

1. LFS error (`Not Found`)
2. Stash/reset did not help
3. File diff looked normal but pull still failed
4. `git lfs checkout` was only partially successful

The real fix was updating `origin` to the correct repository:

```bash
git remote set-url origin ...
```

In short: this was a Git remote and LFS endpoint mismatch.

## 10-second checklist for next time

1. Run `git remote -v` and confirm the repo is correct.
2. Run `git lfs env` and confirm the LFS endpoint matches.
3. If mismatched, fix `origin` first.
4. Retry fetch/pull.
5. Use LFS recovery commands only after remote alignment.
