<?php

use Config\Database;

require_once "./vendor/autoload.php";
$db = new Database();

$conn = $db->getConnection();

$task = new Task($conn);
$router = new Router($task);






