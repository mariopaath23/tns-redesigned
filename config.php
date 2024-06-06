<?php
// Menyambung ke database
require 'lib/dbConnect.php';
date_default_timezone_set('Asia/Makassar');

$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

function createuuid($data = null)
{
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function addStudent($data)
{
    global $conn, $created_at, $updated_at;
    $uuid = createuuid();

    $query = "INSERT INTO student VALUES 
        ('$uuid','{$data['class_uuid']}','{$data['nisn']}', '{$data['student_name']}', '$created_at', '$updated_at')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function addClass($data)
{
    global $conn, $created_at, $updated_at;
    $uuid = createuuid();
    $class_name = htmlspecialchars($_POST["class_name"]);

    $query = "INSERT INTO class VALUES 
	('$uuid','$class_name', '$created_at', '$updated_at')
	";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($userId)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE userId = $userId");
    return mysqli_affected_rows($conn);
}

function presenceUpdate($data)
{
    global $conn;
    $presenceDate = htmlspecialchars($_POST["presenceDate"]);
    $userId = htmlspecialchars($_POST["userId"]);
    $query = "INSERT INTO tb_presence VALUES ('', '$presenceDate', '$userId')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
