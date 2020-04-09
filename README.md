# LaraApi


## lara command
|Command|Feature|usage|
|---|---|---|
|proj new|**start a new laravel+laradock project**<br>run the command in a clean directory<br>and make it become project<br>```-d```  to launch docker daemon before new<br>```-c``` to down docker-compose after new<br>```-g``` to initial git if .git not exist|```sh lara proj new```<br>```sh lara proj new -d```<br>```sh lara proj new -c```<br>```sh lara proj new -g```<br>```sh lara proj new -cdg```|
|proj init|**init a laravel+laradock project after clone**<br>run the command after clone the project<br>```-d```  to launch docker daemon before initial<br>```-c``` to down docker-compose after initial|```sh lara proj init```<br>```sh lara proj init -d```<br>```sh lara proj init -c```<br>```sh lara proj init -cd```|
|up|**up the docker-compose**<br>```-d``` to launch docker daemon before up<br>```-e``` to enter workspace after up|```sh lara up```<br>```sh lara up -d```<br>```sh lara up -e```<br>```sh lara up -de```|
|down|**down the docker-compose**|```sh lara down```|
|restart|**restart the docker-compose**|```sh lara restart```|
|enter|**enter workspace**|```sh lara enter```|
|lara|**% % % for you**|```sh lara lara```|
||||
||==Develop command==||
|git|**fast initial or remove git**<br>```-i```  to initial git if .git not exist<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;laraval directory is required<br>```-d``` to remove git<br>```-r``` to add default remote and push!<br>```-s``` to add commit automatically<br>```-a``` to add amend commit automatically|```sh lara git -i```<br>```sh lara git -d```<br>```sh lara git -r```<br>```sh lara git -r <url>```<br>```sh lara git -s```<br>```sh lara git -s <msg>```<br>```sh lara git -a```<br>```sh lara git -a <msg>```|
