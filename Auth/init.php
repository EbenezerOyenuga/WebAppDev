<?php
// Bootstrap: session + MySQL-backed services
session_start();

// DB credentials — override via environment variables
$dbHost = '127.0.0.1';
$dbName = 'auth_db';
$dbUser = 'auth_user';
$dbPass = 'secret';

// Autoload
spl_autoload_register(function($c){
    $f = __DIR__ . '/lib/' . $c . '.php';
    if (file_exists($f)) require $f;
});

// connect
$pdo = Database::connect($dbHost, $dbName, $dbUser, $dbPass);

// create store and auth service
$store = new UserStore($pdo);
$auth  = new Auth($store);

// helper redirect
function redirect($url){
    header('Location: ' . $url);
    exit;
}