<?php
require __DIR__ . '/init.php';
$auth->logout();
header('Location: login.php');
exit;