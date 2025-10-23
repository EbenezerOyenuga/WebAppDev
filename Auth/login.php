<?php
require __DIR__ . '/init.php';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';
    $remember = !empty($_POST['remember']);

    if (!$email) $errors[] = 'Valid email required';
    if (empty($password)) $errors[] = 'Password required';

    if (empty($errors)) {
        if ($auth->login($email, $password, $remember)) {
            header('Location: home.php');
            exit;
        } else {
            $errors[] = 'Invalid credentials';
        }
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Login</title></head>
<body>
<h2>Login</h2>
<?php foreach($errors as $e): ?>
    <div style="color:red"><?=htmlspecialchars($e)?></div>
<?php endforeach; ?>
<form method="post">
    <label>Email <input type="email" name="email" required></label><br>
    <label>Password <input type="password" name="password" required></label><br>
    <label><input type="checkbox" name="remember"> Remember me</label><br>
    <button type="submit">Login</button>
</form>
<p><a href="register.php">Register</a></p>
</body>
</html>