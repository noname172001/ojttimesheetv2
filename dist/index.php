<?php
session_start();
include __DIR__ . '/../includes/general.inc.php';

$test = loginErrors();

if (!isset($_SESSION['logged_user'])) {
    include __DIR__ . '/views/login.view.php';
} else {
    include __DIR__ . '/views/dashboard.view.php';
}

//use this template to instantiate the user
//$test = new User('aldin', 's', 'moreno', 'usjr', 100, 2, '', '', '', '', 'test@omegahms.com', 'hahapassword', 'admin');
//$test->getUser();
