# Installation Requirements and Instructions
## Using XAMPP (localhost)
**Recommended OS: Windows, MacOS, Linux**


1. Type in the following command in your terminal to download the files from the repository in your device
```
git clone https://github.com/archishab/Team-Riker
```

2. Download the appropiate XAMPP installer for your OS from 
```
https://www.apachefriends.org/download.html
```
4. Once downloaded and installed, open XAMPP and start "Apache" and "MySQL"
5. Download all the files in the code directory to your device and move them to the the following folder
    - **On MacOS:** ```/Applications/XAMPP/xamppfiles/htdocs```
    - **On Windows:**  ```C:\xampp\htdocs```

Note: There might be a index.php file already present in the folder. Please delete or rename that file before transferring the downloaded files

4. Open the following link in your preferred browser 
```
http://localhost/html/index.php
```

### Create Database
1. On a new tab visit ```http://localhost/phpmyadmin```
2. Click on 'New' from the right hand side pane to make a new database
3. Name the database 'Riker'
4. Select Riker from the list of databases on right hand side pane
5. Click on SQL from the top menu
6. Enter the following query to make the 'User' database (also included in the data.sql(**enter link**) file and click on 'Go'

    **enter query**
7. Enter the following query to make the 'Event' database (also included in the event.sql(**enter link**) file and click on 'Go'

    **enter query**
8. Enter the following query to make the 'Type' database (also included in the type.sql(**enter link**) file and click on 'Go'

    **enter query**
10. Enter the following query to add rows to the 'Type' database and click on 'Go'

    **enter query**
11. Enter the following query to make the 'State' database (also included in the type.sql(**enter link**) file and click on 'Go'

    **enter query**
12. Enter the following query to add rows to the 'State' database and click on 'Go'

    **enter query**


The site is now fully functional
