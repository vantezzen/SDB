# sdb
sdb is a simple database, that is purely written in PHP an doesn't need any additional services, programs or deamons running to work.

# installation
Move the "sdb.php" script to your project folder and include it via<br />
```PHP
include("sdb.php");
```
<br />
Create a new folder called "sdb" (the name of the folder can be changed in sdb.php) and give PHP/www-data enought file permissions to read and write to this folder.<br />
You can also create a .htaccess in that folder to deny all requests to the database directly.

# usage
sdb has similar commands to SQL.<br />
To create a new database with the name "test" and the columns "username", "password" and "mail", run<br />
```PHP
sdb::CREATE("test", array("username", "password", "mail"));
```
<br />
Data can be inserted to the database via,
```PHP
sdb::INSERT(array("username" => "vantezzen", "password" => "1234"), "test");
```
<br />
Note, that the column "mail" is left empty in this example. It will just be an empty value in the database.
<br />
To get data from the database, use
```PHP
sdb::SELECT("test", array("username" => "vantezzen"));
```
<br />
The second argument can be left empty to get all columns.
<br />
To update/change data in the database, use
```PHP
sdb::UPDATE("test", array("password" => "123456"), array("username" => "vantezzen"));
```
Again, the third argument can be left empty to change all columns.
