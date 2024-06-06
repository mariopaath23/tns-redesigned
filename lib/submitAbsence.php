<?php
require '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'nisn' => $_POST['nisn'] ?? ''
    ];

    $response = [];

    if (presenceSubmit($data) > 0) {
        $response['status'] = 'success';
        $response['message'] = 'Kehadiran berhasil dicatat!';

        // Fetch the latest presence log entry
        $query = "
            SELECT pl.student_nisn, s.student_name, c.class_name, pl.created_at
            FROM presence_log pl
            JOIN student s ON pl.student_nisn = s.nisn
            JOIN class c ON s.class_uuid = c.uuid
            ORDER BY pl.created_at DESC
            LIMIT 1
        ";
        $result = mysqli_query($conn, $query);
        if ($row = mysqli_fetch_assoc($result)) {
            $response['data'] = $row;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: Gagal mencatat kehadiran. NISN tidak valid.';
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
