Quick steps to migrate SVN to Git repo

Setup a place for it. GitHub, GitLab, a private repo
(We use an internal Gitea instance that auto-backs
up by cron job every night)

1) Lock the SVN repo: 
```bash
[umer936@[SVN_computer] SVN]$ cat [reponame]/hooks/pre-commit
#!/bin/sh
echo "No more commit here - this is an archive branch" 1>&2
exit 1
```
2) Setup the repo on the service using the web GUI or however
3) Follow this guide. Read through it first. Anything done in GitKraken I just do from the terminal. https://www.gitkraken.com/blog/migrating-git-svn
   1) GitKraken is nice though - I used it when I was a student
4) You're done after you do the push
