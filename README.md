# Test Project

## Git Guides
The following commands might not be the best practice but these commands work perfectly with the following setup

### clone repository
```
$ git clone https://github.com/githubusername/reponame.git localreponame
```

### sync remote
```
Clean master
$ git checkout --track origin/branch_name
$ git fetch (optional)
$ git pull
```

### merge branches
```
(on branch development)$ git merge master
(resolve any merge conflicts if there are any)
$ git checkout master
$ git merge development (there won't be any conflicts now)
```

### copy current branch and switch to newly created branch
```
$ git checkout -b feature-branchname
```

### commit changes and push to remote repository
```
$ git add .
$ git commit -m "any message"
$ git push -u origin master
	or $ git push -u origin feature-branchname
	or $ git push -u heroku master
```

### heroku devcycle
```
$ heroku --version (note: this will update heroku's CLI)
$ heroku login
$ heroku create appname
Note: Create Procfile, server and .json files. See heroku doc site [here](https://devcenter.heroku.com/start).
$ git push -u heroku master
```

### decode git flow
```
$ git checkout feature-branchname
$ git add .
$ git commit -m "any message here"
$ git push -u origin feature-branchname
$ git checkout master
$ git merge feature-branchname
$ git push -u origin master
$ git push -u heroku master
```

#### References
* [Github Git Cheat Sheet](https://github.com/github/training-kit/blob/master/downloads/github-git-cheat-sheet.md)
* [Git Cheat Sheet Education](https://education.github.com/git-cheat-sheet-education.pdf)

