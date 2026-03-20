<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => base_path('controllers/index.controller.php'),
    '/test' => base_path('controllers/test.php'),
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    echo "bleh";
}
