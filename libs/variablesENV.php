<?php
require 'vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable('./');
$dotenv->load();

define('APP_NAME' , $_ENV['APP_NAME'].PHP_EOL);

define('DB_CONECTION', $_ENV['DB_CONECTION'].PHP_EOL);
define('DB_HOST', $_ENV['DB_HOST'].PHP_EOL);
define('DB_PORT', $_ENV['DB_PORT'].PHP_EOL);
define('DB_DATABASE', $_ENV['DB_DATABASE'].PHP_EOL);
define('DB_USERNAME', $_ENV['DB_USERNAME'].PHP_EOL);
define('DB_PASSWORD',$_ENV['DB_PASSWORD'].PHP_EOL);
