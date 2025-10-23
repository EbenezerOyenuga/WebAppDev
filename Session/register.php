<?php
ini_set('display_errors', 1);
require_once 'init.php';
require_once 'conn.php';

initialize_users_table($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    // Check if username or email already exists
    $check_query = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();  
    if ($result->num_rows > 0) {
        header("Location: index.php?error=" . urlencode("Username or Email already exists."));
        exit();
    }
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    // Insert new user
    $insert_query = "INSERT INTO users (username, password, phone, address, email) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sssss", $username, $hashed_password, $phone, $address, $email);
    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        header("Location: index.php?error=" . urlencode("Registration failed. Please try again later."));
        exit();
    }
} else {
    echo "Invalid request method.";
}
?>