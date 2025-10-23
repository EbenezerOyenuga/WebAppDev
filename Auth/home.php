<?php
require __DIR__ . '/init.php';
if (!$auth->user()) {
    header('Location: login.php');
    exit;
}
$user = $auth->user();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Home</title></head>
<body>
<h2>Welcome</h2>
<p>Logged in as: <?=htmlspecialchars($user['email'])?></p>
<p><a href="logout.php">Logout</a></p>
</body>
</html>