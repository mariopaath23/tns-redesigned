<?php
require 'config.php';
$userId = $_GET['userId'];

if (delete($userId) > 0){
    echo "
    <script>
        alert('Data Berhasil Dihapus');
        document.location.href = 'queryData.php';
    </script>
    ";
    }

?>