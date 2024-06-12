<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM accounts WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['uuid'] = $user['uuid'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role_id'];
        $_SESSION['created_at'] = $user['created_at'];
        header('Location: ../beranda/index.php');
    } else {
        echo 'Invalid username or password.';
    }
}
