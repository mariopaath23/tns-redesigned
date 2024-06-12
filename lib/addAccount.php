<?php
require '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'username' => htmlspecialchars($_POST['username'] ?? ''),
        'password' => htmlspecialchars($_POST['password'] ?? ''),
        'konfPassword' => htmlspecialchars($_POST['konfPassword'] ?? ''),
        'role_id' => htmlspecialchars($_POST['role_id'] ?? '')
    ];

    if ($data['password'] !== $data['konfPassword']) {
        echo "<script>alert('Error: Password tidak sesuai.');</script>";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    if (addAccount($data) > 0) {
        echo "<script>alert('Admin berhasil ditambahkan!');</script>";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "<script>alert('Error: Gagal menambahkan admin.');</script>";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
