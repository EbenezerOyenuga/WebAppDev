<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['color'])) {
        $color = $_POST['color'];
        setcookie('favorite_color', $color, time() + (86400 * 30), "/"); // 30 days expiration
        header("Location: profile.php");
        exit();
    }
}