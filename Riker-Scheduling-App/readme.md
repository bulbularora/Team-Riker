# Deploying the App

Click this button to deploy the app to the DigitalOcean App Platform. If you are not logged in, you will be prompted to log in with your DigitalOcean account.

[![Deploy to DigitalOcean](https://www.deploytodo.com/do-btn-blue.svg)](https://cloud.digitalocean.com/apps/new?repo=https://github.com/archishab/Team-Riker/tree/main/Riker-Scheduling-App/MVP-code)

# Installation Requirements and Instructions
## Using XAMPP (localhost)
**Recommended OS: Windows, MacOS, Linux**

1. Download the appropiate XAMPP installer for your OS from: https://www.apachefriends.org/download.html
2. Once downloaded and installed, open XAMPP and start "Apache" and "MySQL"
3. Download all the files in the code directory to your device and move them to the the following folder
    - **On MacOS:** /Applications/XAMPP/xamppfiles/htdocs
    - **On Windows:**  C:\xampp\htdocs

Note: There might be a index.php file already present in the folder. Please delete or rename that file before transferring the downloaded files

4. Visit http://localhost/html/index.php on your preferred browser

### Create Database
1. On a new tab visit http://localhost/phpmyadmin
2. Click on 'New' from the right hand side pane to make a new database
3. Name the database 'Riker'
4. Select Riker from the list of databases on right hand side pane
5. Click on SQL from the top menu
6. Enter the following query to make the 'User' database (also included in the data.sql(**enter link**) file and click on 'Go'

    **enter query**
7. Enter the following query to make the 'Event' database (also included in the event.sql(**enter link**) file and click on 'Go'

    **enter query**


The site is now fully functional
