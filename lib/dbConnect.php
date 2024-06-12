<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "absence-db-v2";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
