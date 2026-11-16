<?php

mysqli_report(MYSQLI_REPORT_OFF);

$host = '127.0.1.0';
$user = 'root';
$pass = 'root';
$db   = 'parkirin';
$port = 3306;

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');

?>
