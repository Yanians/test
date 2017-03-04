# Test Project

## Git Guides
The following commands might not be the best practice but these commands works perfectly with the following setup

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

#### References
* [Github Git Cheat Sheet](https://github.com/github/training-kit/blob/master/downloads/github-git-cheat-sheet.md)
* [Git Cheat Sheet Education](https://education.github.com/git-cheat-sheet-education.pdf)

