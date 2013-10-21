<?php
// Everything is relative to the application root
chdir(dirname(__DIR__));

! defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(''));

// Setup autoloading
include 'init_autoloader.php';

// Turn on error reporting
error_reporting(E_ALL | E_STRICT);

// Configuration
$appConfig = include 'config/application.config.php';

if ($devMode = file_exists('config/development.config.php')) {
    $appConfig = Zend\Stdlib\ArrayUtils::merge($appConfig, include 'config/development.config.php');
}

// Only display errors in development
ini_set("display_errors", $devMode);

// Run the application!
Zend\Mvc\Application::init($appConfig)->run();
