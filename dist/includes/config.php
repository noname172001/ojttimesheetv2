<?php

return [
    'database' => [
        'db_host' => 'localhost',
        'db_name' => 'timetrackerdbv2',
        'db_user' => 'root',
        'db_pass' => '',
        'charset' => 'utf8mb4',
    ],
    'pdo_options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ],
    'app_details' => [
        'app_name' => 'OJT Timetracker',
        'app_tzone' => 'Asia/Manila',
    ],
];
