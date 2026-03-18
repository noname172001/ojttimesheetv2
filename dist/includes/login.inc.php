<?php
include '../../classes/login.class.php';
$connection = require __DIR__ . '/connection.php';

// get the post data
$email = trim($_POST['email']);
$password = trim($_POST['password']);

/* // input validation and error checking
if (empty($email) || empty($password)) {
    header("Location: ../dist/index.php?error=emptyinput");
    exit();
}
 */

$userlogin = new Login($email, $password, $connection);
$userlogin->loginUser();
