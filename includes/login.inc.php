<?php
include __DIR__ . '/../classes/login.class.php';
$connection = require __DIR__ . '/../includes/connection.php';

$newlogin = new Login($connection);

return $newlogin;
