<?php

function __($key, $lang = 'en') {
    $translations = include __DIR__ . "/lang/{$lang}.php";
    return $translations[$key] ?? $key;
}