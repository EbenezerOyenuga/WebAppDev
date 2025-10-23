<?php
// Simple redirect to login or home
require __DIR__ . '/init.php';
if ($auth->user()) {
    header('Location: home.php');
} else {
    header('Location: login.php');
}
exit;