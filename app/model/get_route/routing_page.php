<?php

require 'routes/web.php';

// Get the requested page from the URI
$uri = $_SERVER['REQUEST_URI'];
$uriSegments = explode('/', trim($uri, '/'));

// Determine the requested page or default to 'home'
$page = $uriSegments[1] ?? 'home';

// Ensure the requested page is valid
if (!array_key_exists($page, $routes)) {
    $page = 'home';
}

// Correct the path to the view files
$folder_dir_temp = "'/../../../'" . $routes[$page];
$folder_dir_final = str_replace("'", "", $folder_dir_temp);
$viewPath = __DIR__ . $folder_dir_final;

include $viewPath;
