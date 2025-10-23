<?php
require __DIR__ . '/init.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';

    if (!$email) $errors[] = 'Valid email required';
    if (strlen($password) < 6) $errors[] = 'Password minimum 6 chars';
    if ($password !== $password2) $errors[] = 'Passwords do not match';

    if (empty($errors)){
        try {
            $auth->register($email, $password);
            header('Location: home.php');
            exit;
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
        }
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Register</title></head>
<body>
<h2>Register</h2>
<?php foreach($errors as $e): ?>
    <div style="color:red"><?=htmlspecialchars($e)?></div>
<?php endforeach; ?>
<form method="post">
    <label>Email <input type="email" name="email" required></label><br>
    <label>Password <input type="password" name="password" required></label><br>
    <label>Confirm <input type="password" name="password2" required></label><br>
    <button type="submit">Register</button>
</form>
<p><a href="login.php">Login</a></p>
</body>
</html>