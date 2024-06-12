<?php
session_start();

if (!isset($_SESSION['uuid'])) {
    // The user is not logged in. Redirect them to the login page.
    header('Location: ../../tns-redesigned/index.php');
    exit;
}
