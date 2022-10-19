<?php
declare(strict_types=1);

require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$conn = new mysqli($_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PWD'],$_ENV['DB_DB']);

header("Content-Type: text/html");
if($conn->connect_errno)
{http_response_code(400);
    echo  $conn->connect_error; exit();}


