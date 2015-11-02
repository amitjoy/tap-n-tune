<?php

// database config
error_reporting(E_ALL);

// we need session
session_start();

// YOUR DATABASE CONFIG && // use for HTTP
require_once "../lib/db.php";

// encription salt
define('SALT',		'&*^85sA5a$68#d*hh3s_t');

// how many times can a user enter his credentials
define('MAXLOGINTRIES', 5);

// can login more than one user in the same time
define('MULTILOGIN', true);

// define imagick path (not needed)
# define('IMAGICKPATH', 'c:\path\imagemagick\convert.exe');

// require classes
require dirname(__FILE__).'/lib/class.db.inc.php';
require dirname(__FILE__).'/lib/class.lang.inc.php';
require dirname(__FILE__).'/lib/class.user.inc.php';
require dirname(__FILE__).'/lib/class.admin.inc.php';

// set current language (default is EN)
if(!isset($_SESSION['LANGUAGE_CURRENT'])) {
	$_SESSION['LANGUAGE_CURRENT'] = 'en';
}

if(false == is_file(dirname(__FILE__).'/install.php')) {
	// get LANG object with new language
	$LANG = new lang( isset($_GET['lang'])?$_GET['lang']:'', BASE_URL );
}

