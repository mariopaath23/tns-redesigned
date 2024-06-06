<?php
require '../config.php'; // This includes the functions from your config.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Output received POST data
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Retrieve form data
    $data = [
        'class_name' => htmlspecialchars($_POST['class_name'] ?? '')
    ];

    // Call the addClass function
    if (addClass($data) > 0) {
        echo "<script>alert('Kelas berhasil ditambahkan!');</script>";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "<script>alert('Error: Gagal menambahkan kelas.');</script>";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
