<?php

// this is where all other functions goes
function loginErrors()
{
    // initiate all the login errors array
    $errors = [
        'emptyinput' => 'Please fill up all the required fields.',
        'invalidemail' => 'Please enter a valid email.',
        'errorlogin' => 'Username or password is incorrect.',
        'usernotfound' => 'Cannot find the user'
    ];

    $query_string = $_SERVER['QUERY_STRING'];
    $result = str_contains($query_string, 'error=') ? substr($query_string, 6) : null;
    return array_key_exists($result, $errors) ? $errors[$result] : null;
}
