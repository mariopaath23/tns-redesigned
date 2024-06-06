<?php
require_once('../config.php');

// Check if form is submitted
if (isset($_POST['submit'])) {

    // Get class name from form data
    $nisn = htmlspecialchars($_POST["nisn"]);
    $student_name = htmlspecialchars($_POST["student_name"]);
    $class_uuid = $_POST["class_uuid"];

    $rows_affected = addStudent(array(
        'nisn' => $nisn,
        'student_name' => $student_name,
        'class_uuid' => $class_uuid
    ));

    if ($rows_affected > 0) {
        echo "<script>alert('Siswa berhasil ditambahkan!');</script>";
    } else {
        echo "<script>alert('Error: Gagal menambahkan kelas.');</script>";
    }
}
