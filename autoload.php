<?php

//autoload

spl_autoload_register(function ($className) {
    // Define your base directory where your namespaced classes reside
    $baseDir = __DIR__ . '/Oop/';

    // Convert namespace separators to directory separators
    $filePath = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';

    // If the file exists, include it
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});