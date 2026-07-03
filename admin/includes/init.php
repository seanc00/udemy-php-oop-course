<?php 

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// Site root
define('SITE_ROOT', DS . 'Users' . DS . 'seanconnolly' . DS . 'Development' . DS . 'Websites' . DS . 'php-galleryproject.test');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS . 'admin' . DS . 'includes');


require_once("functions.php");
require_once("new_config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");
require_once("session.php");