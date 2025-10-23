<?php

require_once 'init.php';
require_once 'conn.php';

initialize_users_table($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $check_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Start session and set user ID
            session_start();
            //$_SESSION['user_id'] = $user['id'];
            $_SESSION['user']=$user;
            header("Location: profile.php");
            exit();
        } else {
            header("Location: login.php?error=" . urlencode("Invalid email or password."));
            exit();
        }
    } else {
        header("Location: login.php?error=" . urlencode("Invalid email or password."));
        exit();
    }
} else {
    echo "Invalid request method.";
}
?>