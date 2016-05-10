# README #

Snapshot currently has three primary branches: `master` (Snapshot 2.4), `2.5` (Snapshot Pro) and `snapshot/standard` (Snapshot).

## Snapshot (master)

This is the current version of Snapshot on WPMU DEV and will be replaced by **Snapshot Pro** on the `2.5` branch.

## Snapshot Pro (2.5)  

Snapshot Pro is the official premium plugin that will live on WPMU DEV. Once launched this will become the `master` branch.  

Note: Snapshot is being renamed to **Snapshot Pro** for WPMU DEV.

## Snapshot (snapshot/standard)  

Snapshot is goint to be the version that lives on Wordpress.org as the free version of Snapshot.  It has exactly the same code base as Snapshop Pro, but the destinations have been removed and the is_pro() method set to return false.  

### Working with the branches

#### Cloning ####

When cloning Snapshot to your local repo please use the --recursive flag as part of your clone command:  

    git clone git@bitbucket.org:incsub/snapshot.git --recursive  

This will ensure you grab all the required submodules.  

**Note: ** If you already have a cloned repo, you will need to *init* the submodule.  You may need to do this in the branches.

    git submodule init --   
    git submodule update  

#### Checking out branches  

When checking out branches please make sure that you run 'git clean -dff' and then 'git submodule update'.  

This is required as Snapshot makes use of submodules, and different branches could be using different submodules. Checking out the branches without cleaning up and initialising will cause a bit of a mess in your staging environment.

Examples:

    git checkout master  
    git clean -dff  
    git submodule update  

or  

    git checkout snapshot/standard  
    git clean -dff  
    git submodule update  

Please note the double -f flag in the clean command. This is required to clean directories that contain a submodule repo.  

##### Properly Update the Repo

**Note:**  
`git submodule update` or `git submodule update --recursive` only updates the local repo, but the associated commit ID does not match.  

You can verify this by running the following commands:  

    # This will show the 'actual' commit ID used within coursepress/pro branch
	git ls-files --stage | grep "lib/WPMUDEV/Dashboard"
	
	# This will show the commit ID of the local repo (pushing to origin will not keep this ID!)  
	git submodule status  

To properly update the submodule you will need to go to the submodule folder and do the following:  

    # Checkout 'master' because submodules often end up in a detached HEAD state  
	git checkout master  
	
	# Pull the update  
	git pull origin master  

Now when you run a `git status` you will see that the submodule has been updated.

    git status
	# ... modified:   lib/WPMUDEV/Dashboard (new commits)
	
Now add, commit and push:  

    git add . -A  
    git commit  
    git push  

##### When someone else updated the submodules  already

When running `git submodule update` it makes sure that you have the latest submodule in your branch updated to the latest commit ID of the submodule. Perhaps even do this after fetching changes from the repo.  

### Releasing

## Snapshot Standard (wp.org version)

Remove **this** readme file, but **DO NOT** remove readme.txt.