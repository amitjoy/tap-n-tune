<?php
// DB CONFIGURATION
define('HOST',		'localhost');
define('USER',		'root');
define('PASS',		'');
define('DBNAME',	'amit_tapntune');

// USE FOR HTTP FOR ADMIN PANEL
define('BASE_URL', '/music/admin/');

if(!mysql_connect(HOST,USER,PASS))
die('Error connecting to mySQL host');
else
if(!mysql_select_db(DBNAME))
die('Error selecting Database');

?>