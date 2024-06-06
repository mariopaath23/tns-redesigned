<?php
require_once('../config.php');

// Check if form is submitted
if (isset($_POST['submit'])) {

    // Get class name from form data
    $class_name = htmlspecialchars($_POST["class_name"]);

    // Call the addClass function and handle the result
    $rows_affected = addClass(array('class_name' => $class_name));

    if ($rows_affected > 0) {
        echo "<script>alert('Kelas berhasil ditambahkan!');</script>";
    } else {
        echo "<script>alert('Error: Gagal menambahkan kelas.');</script>";
    }
}
