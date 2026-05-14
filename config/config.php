<?php

date_default_timezone_set('Asia/Manila');

define('BASE_URL', 'http://localhost/cms/');

// HIDE ERRORS FROM BROWSER
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

// ENABLE ERROR LOGGING
ini_set('log_errors', 1);
error_reporting(E_ALL);

// LOG FILE
ini_set('error_log', __DIR__ . '/error/php_error.log');

?>