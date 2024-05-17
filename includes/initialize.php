<?php
// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP predefined constant:
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// Define the site root directory
// This combines the document root (typically the base directory of the web server)
// with the 'bluecollar' directory
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . 'bluecollar');

// Define the library path
// This combines the site root with the 'includes' directory
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'includes');

// Load the database configuration file first
require_once(LIB_PATH . DS . "config.php");

// Load additional function definitions
require_once(LIB_PATH . DS . "function.php");

// Load the session handling class or functions
require_once(LIB_PATH . DS . "session.php");

// Load the accounts management class or functions
require_once(LIB_PATH . DS . "accounts.php");

// Load the service provider class or functions
require_once(LIB_PATH . DS . "serviceprovider.php");

// Load the client management class or functions
require_once(LIB_PATH . DS . "client.php");

// Load the request handling class or functions
require_once(LIB_PATH . DS . "request.php");

// Load the database connection script
require_once(LIB_PATH . DS . "database.php");
?>
