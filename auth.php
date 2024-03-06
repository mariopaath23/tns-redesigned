<?php
session_start();
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'absence-db';

// Menyambung ke database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if( mysqli_connect_errno() ){
    exit('Gagal terhubung ke database: ' . mysqli_connect_error());
}

// Cek status form login
if (!isset($_POST['username'], $_POST['password'])) {
    // Belum terisi
    exit('Mohon mengisi kedua kolom username dan password!');
}

// Login + anti SQL Injection 
if ($stmt = $conn->prepare('SELECT id, password FROM usr_admin WHERE username = ?')) {
    $stmt -> bind_param('s', $_POST['username']);
    $stmt -> execute();
    // Simpan hasil untuk dicek
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt -> bind_result($id, $password);
        $stmt -> fetch();
        
        // Jika ada, selanjutnya dilakukan verifikasi password
        if ($_POST['password'] == $password) {
            // Jika memenuhi, user bisa masuk
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: home.php');
        }
        else {
            // Password salah
            echo 'Username dan/atau password salah!';
        }
    }
    else{
        // Username salah
        echo 'Username dan/atau password salah!';
    }

    $stmt -> close();
}

?>