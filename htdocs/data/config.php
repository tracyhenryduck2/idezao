<?php
// database host
$db_host   = "127.0.0.1:3306";

// database name
$db_name   = "jd50";

// database username
$db_user   = "root";

// database password
$db_pass   = "";

// table prefix
$prefix    = "ecs_";

$timezone    = "UTC";

$cookie_path    = "/";

$cookie_domain    = "";

$session = "1440";

define('EC_CHARSET','utf-8');

if(!defined('ADMIN_PATH'))
{
define('ADMIN_PATH','admin');
}

define('AUTH_KEY', 'this is a key');

define('OLD_AUTH_KEY', '');

define('API_TIME', '2018-03-05 10:58:48');

?>
