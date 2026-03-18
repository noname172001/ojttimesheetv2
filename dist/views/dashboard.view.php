<?php
session_start();

echo "Welcome {$_SESSION['logged_user']}";
echo "<br>";
echo "<br>";
echo "<br>";
$path = __DIR__ . '/includes/logout.inc.php';
echo "<a href='.$path.'>Logout</a>";
