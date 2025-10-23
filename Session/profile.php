<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <a href="logout.php">logout</a>
    <div style="width:100px; height:100px; background-color: <?php echo isset($_COOKIE['favorite_color']) ? $_COOKIE['favorite_color'] : '#000'; ?>;"><?php echo isset($_COOKIE['favorite_color']) ? $_COOKIE['favorite_color'] : 'No favorite color selected'; ?></div>
    <p>Welcome, <strong><?php echo $_SESSION['user']['username']; ?></strong>!</p>
    <h2>Your Details</h2>
    <ul>
        <li>Email: <?php echo $_SESSION['user']['email']; ?></li>
        <li>Phone: <?php echo $_SESSION['user']['phone']; ?></li>
        <li>Address: <?php echo $_SESSION['user']['address']; ?></li>
    </ul>

    <form action="color.php" method="POST">
    <label for="favorite_color">Select Favourite Color</label>
    <input type="color" name="color" id="">
    <input type="submit" value="Save">
    </form>
</body>
</html>