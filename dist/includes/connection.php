<?php
require_once __DIR__ . '/../classes/database.class.php';
$config = require __DIR__ . '/../includes/config.php';
$connection = Database::getConnection($config);

return $connection;
