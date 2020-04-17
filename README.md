# LaraApi project
## Prerequest
### OS
*  MacOS (totally)
*  Linux (partial, script are write for mac currently)
### Environment
* [docker-daemon](https://www.docker.com/): ```brew cask install docker```  
&nbsp;&nbsp;&nbsp;Or we might unable to launch docker
* [docker-compose](https://docs.docker.com/compose/): ```brew install docker-compose```  
&nbsp;&nbsp;&nbsp;&nbsp;Laradock need it to launch multiple docker
* [git](https://git-scm.com/): ```brew install git```  
&nbsp;&nbsp;&nbsp;&nbsp;You need this to clone the project

### That's it!!
&nbsp;&nbsp;&nbsp;&nbsp;No PHP required.  
&nbsp;&nbsp;&nbsp;&nbsp;No composer required.  
&nbsp;&nbsp;&nbsp;&nbsp;Environment will be set correctly for you with docker!!

## Install / Setting
### Note before:
* Computer password might required while running the initial script, since it will register domain to '/etc/hosts'
* Laradock default open mysql port for all user in the same network. Do not connect to unknown wifi while using the default database user and password.

### Clone it, Enter it, Run it, NOW!!!
```
git clone git@github.com:chumicat/laraApi.git
cd laraApi
bash lara.sh init    # Run this if had start docker-daemon
bash lara.sh init -d # Run this if hadn't start docker-daemon
```
### Well done!
&nbsp;&nbsp;&nbsp;&nbsp;Well done!! Site must had show on your browser.

### When Finish...
* If you want to down the server, run the command below:
  ```bash
  bash lara.sh down
  ```
* If you want to start it again, run the command below:
  ```bash
  bash lara.sh up
  ```
* If you want to enter the environment, run the command below:
  ```bash
  bash lara.sh enter
  ```
* For more commands, see [lara command](#lara-command) section

## API Usage
### Browser All Data
* You can see all data through browser at [NTR local site](http://laravel.test/ntr) after initial the project.
* Request is supported, here are some example:
  + http://laravel.test/ntr?name=Balloon
  + http://laravel.test/ntr?tag=High
  + http://laravel.test/ntr?name=Snic&tag=Delightful
  + http://laravel.test/ntr?tag=Cat&tag=Dog
* NTR locat site also implement create  
  You can add data and refresh page to see the result  
  Since Request is supported either, It should be easier to search.  
  Example: 
  + http://laravel.test/ntr/create?name=Balloon

### API List
* You can use [Swagger API Document](http://laravel.test/api/documentation) to test each API after initial the project.
* Foreign key will be restrict and not able to change database value

|Method|Link|Method|Genre|
|---|---|---|---|
|POST|http://laravel.test/api/name|name.store|api|
|GET\|HEAD|http://laravel.test/api/name|name.index|api|
|GET\|HEAD|http://laravel.test/api/name/{name}|name.show|api|
|PUT\|PATCH|http://laravel.test/api/name/{name}|name.update|api|
|DELETE|http://laravel.test/api/name/{name}|name.destroy|api|
|GET\|HEAD|http://laravel.test/api/resume|resume.index|api|
|POST|http://laravel.test/api/resume|resume.store|api|
|DELETE|http://laravel.test/api/resume/{resume}|resume.destroy|api|
|GET\|HEAD|http://laravel.test/api/resume/{resume}|resume.show      |api|
|PUT\|PATCH|http://laravel.test/api/resume/{resume}|resume.update    |api|
|GET\|HEAD|http://laravel.test/api/resumetag|resumetag.index  |api|
|POST|http://laravel.test/api/resumetag|resumetag.store  |api|
|PUT\|PATCH|http://laravel.test/api/resumetag/{resumetag}|resumetag.update|api|
|GET\|HEAD|http://laravel.test/api/resumetag/{resumetag}|resumetag.show|api|
|DELETE|http://laravel.test/api/resumetag/{resumetag}|resumetag.destroy|api|
|POST|http://laravel.test/api/tag|tag.store|api|
|GET\|HEAD|http://laravel.test/api/tag|tag.index|api|
|DELETE|http://laravel.test/api/tag/{tag}|tag.destroy|api|
|GET\|HEAD|http://laravel.test/api/tag/{tag}|tag.show|api|
|PUT\|PATCH|http://laravel.test/api/tag/{tag}|tag.update|api|
|GET\|HEAD|http://laravel.test/ntr|ntr.index|web|
|GET\|HEAD|http://laravel.test/ntr/create|ntr.create|web|


## lara command
|Command|Feature|usage|
|---|---|---|
|new|**Start a new laravel+laradock project**<br>run the command in a clean directory<br>and make it become project<br>```-d```  to launch docker daemon before new<br>```-g``` to initial git if .git not exist<br>```-c``` to down docker-compose after new<br>ref: <a style='background-color:#fff1a7'>proj new</a>, <a style='background-color:#fff1a7'>up</a>, -g <a style='background-color:#fff1a7'>git -i</a>|```sh lara new```<br>```sh lara new -d```<br>```sh lara new -g```<br>```sh lara new -c```<br>```sh lara new -cd```<br>```sh lara new -cg```<br>```sh lara new -dg```<br>```sh lara new -cdg```|
|init|**Init a laravel+laradock project after clone**<br>run the command after clone the project<br>```-d```  to launch docker daemon before initial<br>```-c``` to down docker-compose after initial<br>ref: <a style='background-color:#fff1a7'>proj init</a>, <a style='background-color:#fff1a7'>up</a>, -c <a style='background-color:#fff1a7'>down</a>, !-c <a style='background-color:#fff1a7'>site</a>|```sh lara init```<br>```sh lara init -d```<br>```sh lara init -c```<br>```sh lara init -cd```|
|up|**Up the docker-compose**<br>```-d``` to launch docker daemon before up<br>```-e``` to enter workspace after up<br>&nbsp;&nbsp;&nbsp;&nbsp;```-r``` to enter as root user<br>```-n``` to reject ```-e``` by developer<br>ref: -e <a style='background-color:#fff1a7'>enter</a><br>|```sh lara up```<br>```sh lara up -d```<br>```sh lara up -e```<br>```sh lara up -er```<br>```sh lara up -de```<br>```sh lara up -der```|
|down|**Down the docker-compose**|```sh lara down```|
|restart|**Restart the docker-compose**|```sh lara restart```|
|downup|**down then up the docker-compose**<br>used to test feature that can't use restart<br>```-e``` to enter workspace after up<br>&nbsp;&nbsp;&nbsp;&nbsp;```-r``` to enter as root user<br>ref: <a style='background-color:#fff1a7'>down</a>, <a style='background-color:#fff1a7'>up</a>, -e <a style='background-color:#fff1a7'>enter</a>|```sh lara downup```<br>```sh lara downup -e```<br>```sh lara downup -er```|
|enter|**Enter workspace**<br>```-r``` to enter as root user|```sh lara enter```<br>```sh lara enter -r```|
|site|**Show site in browser**|```sh lara site```<br>```sh lara site index.php```|
|lara|**% % % for you**|```sh lara lara```|
||||
||<a style="background-color:#fff1a7">Develop command</a>||
|git|**Fast initial or remove git**<br>```-i```  to initial git if .git not exist<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;laraval directory is required<br>```-d``` to remove git<br>```-r``` to add default remote and push!<br>```-s``` to add commit automatically<br>```-a``` to add amend commit automatically|```sh lara git -i```<br>```sh lara git -d```<br>```sh lara git -r```<br>```sh lara git -r <url>```<br>```sh lara git -s```<br>```sh lara git -s <msg>```<br>```sh lara git -a```<br>```sh lara git -a <msg>```|
|proj new<br>proj init|**Project initial handler**<br>command new and init is an alias ot this<br>since these do similar behavior<br>we can reuse code by group them  |```sh lara proj new```<br>```sh lara proj new -d```<br>```sh lara proj new -c```<br>```sh lara proj new -g```<br>```sh lara proj new -cdg```<br>```sh lara proj init```<br>```sh lara proj init -d```<br>```sh lara proj init -c```<br>```sh lara proj init -cd```|
