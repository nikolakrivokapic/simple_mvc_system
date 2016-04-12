This is the test project done by me, Nikola Krivokapic.
It's the basic user registration system with the search form for searching the users from the database.
It's done in pure PHP without any framework, and it's representation of the MVC pattern, 
but it can be further improved, more logic separation and to build custom router. Index.php here 
function as both a layout for views and router for the project. 
This type of task can be done in a various ways, but i did it in the following way:
I decided for MVC design pattern. Used composer for autoloading classes and dependency management. Currently, only
Valitron library for form validation is defined in the composer.
For the navigation I have used one index.php as the layout, and other php files as views hosted by index.php.
GET variables are used for navigation between pages (they are validated).
$_SESSION variables are used for search results, logging, and other communication between pages.

I used classic PDO extension for database communication and model class User.php is containing 
the database communication logic for adding users, checking and searching.
For frontend development, Bootstrap css library is used.
 
INSTALLATION INSTRUCTIONS
 
Execute "composer update" to be sure autoloading is properly set.
Inside db folder there is creatDB.sql file which contains database dump instructions for building database and table.
Import this file in your MYSQL db or execute commands to build database. Extract the files in main directory on your server.

Insert your username, password, hostname and database name inside Database.php class file inside 'models' folder.

This should be enough to access the website on your server.
