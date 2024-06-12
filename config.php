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
    if (!$result) {
        return [];
    }
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

    $class_uuid = mysqli_real_escape_string($conn, $data['class_uuid']);
    $nisn = mysqli_real_escape_string($conn, $data['nisn']);
    $student_name = mysqli_real_escape_string($conn, $data['student_name']);

    $query = "INSERT INTO student (uuid, class_uuid, nisn, student_name, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssss", $uuid, $class_uuid, $nisn, $student_name, $created_at, $updated_at);

    mysqli_stmt_execute($stmt);

    $affected_rows = mysqli_stmt_affected_rows($stmt);

    mysqli_stmt_close($stmt);

    return $affected_rows;
}

function addClass($data)
{
    global $conn, $created_at, $updated_at;
    $uuid = createuuid();

    $class_name = mysqli_real_escape_string($conn, $data['class_name']);

    $query = "INSERT INTO class (uuid, class_name, created_at, updated_at) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $uuid, $class_name, $created_at, $updated_at);

    mysqli_stmt_execute($stmt);

    $affected_rows = mysqli_stmt_affected_rows($stmt);

    mysqli_stmt_close($stmt);

    return $affected_rows;
}

function addAccount($data)
{
    global $conn, $created_at, $updated_at;
    $uuid = createuuid();
    $username = mysqli_real_escape_string($conn, $data['username']);
    $password = password_hash($data['password'], PASSWORD_BCRYPT);
    $role_id = $data['role_id'];

    $query = "INSERT INTO accounts (uuid, username, password, role_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssiss", $uuid, $username, $password, $role_id, $created_at, $updated_at);

    mysqli_stmt_execute($stmt);

    $affected_rows = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    return $affected_rows;
}

function presenceSubmit($data)
{
    global $conn, $created_at;
    $uuid = createuuid();

    $student_nisn = mysqli_real_escape_string($conn, $data['nisn']);

    // Check if the NISN exists in the student table
    $check_query = "SELECT COUNT(*) FROM student WHERE nisn = ?";
    $stmt_check = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt_check, "s", $student_nisn);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_bind_result($stmt_check, $count);
    mysqli_stmt_fetch($stmt_check);
    mysqli_stmt_close($stmt_check);

    if ($count == 0) {
        // NISN does not exist in the student table
        return 0;
    }

    $query = "INSERT INTO presence_log (uuid, student_nisn, created_at) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $uuid, $student_nisn, $created_at);

    mysqli_stmt_execute($stmt);

    $affected_rows = mysqli_stmt_affected_rows($stmt);

    mysqli_stmt_close($stmt);

    return $affected_rows;
}


function delete($userId)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE userId = $userId");
    return mysqli_affected_rows($conn);
}
