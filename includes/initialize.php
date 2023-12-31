<?php
//define the core paths
//Define them as absolute peths to make sure that require_once works as expected

//DIRECTORY_SEPARATOR is a PHP Pre-defined constants:
//(\ for windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'bluecollar');

defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'includes');

//load the database configuration first.
require_once(LIB_PATH.DS."config.php");
require_once(LIB_PATH.DS."function.php");
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."accounts.php"); 
require_once(LIB_PATH.DS."serviceprovider.php"); 
require_once(LIB_PATH.DS."client.php"); 
require_once(LIB_PATH.DS."request.php"); 

//load the database connection
require_once(LIB_PATH.DS."database.php");
?>
