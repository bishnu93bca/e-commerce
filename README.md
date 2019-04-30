 # Sample E-commerce Porject 
Git global setup 
	git config --global user.name "Demo"
	git config --global user.email "Demo@gmail.com"

Create a new repository
	git clone https://gitlab.com/bishnuray/demo.git
	cd demo
	touch README.md
	git add README.md
	git commit -m "add README"
	git push -u origin master

Push an existing folder
	cd existing_folder
	git init
	git remote add origin https://gitlab.com/bishnuray/demo.git
	git add .
	git commit -m "Initial commit"
	git push -u origin master

Push an existing Git repository
	cd existing_repo
	git remote rename origin old-origin
	git remote add origin https://gitlab.com/bishnuray/demo.git
	git push -u origin --all
	git push -u origin --tags

Git global setup 
	git config --global user.name "Demo"
	git config --global user.email "Demo@gmail.com"

Command line instructions
1. git init
2. git add [filename] || -A
3. git status
4. git commit -m "Initial commit"
5. git remote add origin remote_url_name
6. git push origin master
7. git pull origin master

Command line instructions
1. git clone (remote url).
2. git remote -v
	origin	(remote)  (fetch)
	origin	(remote) (push)
3. git remote set-url origin (remote url)
    1. git push origin (branch name) master
    2. git fetch origin (branch name) master

