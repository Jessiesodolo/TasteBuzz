# TasteBuzz
Websystems Development Project Team 9

TasteBuzz is a web app designed to give recommendations of alcoholic drinks based on preferences that users provide.

The application is generally structured as a series of main pages the user will visit.  These pages communicate with a series
of dedicated backend pages which in turn communicate with the MySQL database.  Communication to backend pages is done via a
combination of form POSTs and AJAX requests.  

The application makes use of bootstrap to allow for a good looking scalable user interface.

Installation instructions:
-Place the files wherever you'd like to have them
-Point apache to the files
-Import the tastebuzz.sql file into phpMyAdmin
-All done!

NOTE:
When you create an account, you will have to manually set it as an administrator via phpMyAdmin.  This only has to be done for the first account created.

NOTE:
Make sure you are using at least PHP version 5.5

Sources used:
http://cocktails.about.com/od/outonthetown/ss/bartend_memory.htm#showall