<?php

define('ABSPATH', dirname(__FILE__));
define('SYS', ABSPATH . '/sys');
define('MODS', ABSPATH . '/modules');
define('PREFIX', 'rs_');
define('DB_HOST', 'localhost');
define('DB_NAME', 'redsky');
define('DB_U', 'root');
define('DB_P', 'visvires');
define('DEFAULT_MODULE', 'default');
define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_ACTION', 'index');
define('ADMIN_U', 'redsky');
define('ADMIN_P', 'redpass');

//framework bootstrap
require_once(SYS . '/core/bootstrap.php');