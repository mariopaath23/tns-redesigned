<?php
require '../config.php'; // This includes the functions from your config.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Output received POST data
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Retrieve form data
    $data = [
        'nisn' => $_POST['nisn'] ?? '',
        'student_name' => $_POST['student_name'] ?? '',
        'class_uuid' => $_POST['class_uuid'] ?? ''
    ];

    // Call the addStudent function
    if (addStudent($data) > 0) {
        echo "Data siswa berhasil ditambahkan!";
    } else {
        echo "Gagal menambahkan data siswa.";
    }
}
