<?php 
ini_set('display_errors', 1);

define('ABSPATH', __DIR__);
define('ADMIN_PATH', ABSPATH. '/admin');
define('ADMIN_SCRIPT_PATH', ADMIN_PATH. '/scripts');

require_once ABSPATH.'/config/database.php';
require_once ADMIN_SCRIPT_PATH.'/functions.php';
date_default_timezone_set('America/Toronto');