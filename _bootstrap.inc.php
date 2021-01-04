<?php

declare(strict_types=1);

session_start();

/**
 * Database config details
 */

require_once "vendor/autoload.php";

use App\Core\App;
use App\Core\Database\Database;

$db_config = [
    'HOST' => 'localhost',
    'DATABASE' => 'bookstore',
    'USERNAME' => 'root',
    'PASSWORD' => '',
];


Database::init($db_config);

/**
 * Init global variables
 */

define('SITE_URL', 'http://localhost');
define('BASE_PATH', __DIR__);
define('APP_NAME', 'Bookstore Man');
define('APP_VERSION', '0.0.1');


App::setTitle("");