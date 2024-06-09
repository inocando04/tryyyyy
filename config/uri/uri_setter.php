<?php

define('BASE_URI', '/Pledge-Management-System/');

$search = isset($_GET['search']) ? $_GET['search'] : 'home';
$_SESSION['search'] = $search;

$currentURI = $_SERVER['REQUEST_URI'];

$newURI = rtrim(BASE_URI, '/') . '/' . $search;

$_SERVER['REQUEST_URI'] = $newURI;
?>
