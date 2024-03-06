<?php
// Menyambung ke database
$conn = mysqli_connect("localhost", "root", "", "absence-db");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function add ($data){
    global $conn;
    $nis = htmlspecialchars( $_POST['nis'] );
    $nisn = htmlspecialchars( $_POST['nisn'] );
    $fullName = htmlspecialchars($_POST["fullName"]);
    $address = htmlspecialchars($_POST["address"]);
    $dateOfBirth = htmlspecialchars($_POST["dob"]); 
    $classId = htmlspecialchars($_POST["classId"]);

    $query = "INSERT INTO pengguna VALUES 
	('','$nis','$nisn','$fullName','$address','$dateOfBirth','$classId')
	";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function delete ($userId){
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE userId = $userId");
    return mysqli_affected_rows($conn);
}

function presenceUpdate ($data) {
    global $conn;
    $presenceDate = htmlspecialchars($_POST["presenceDate"]);
    $userId = htmlspecialchars($_POST["userId"]);
    $query = "INSERT INTO tb_presence VALUES ('', '$presenceDate', '$userId')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>