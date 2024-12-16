<?php
$host = "localhost";
$username = "root";  // Sesuaikan dengan username DB Anda
$password = "";      // Sesuaikan dengan password DB Anda
$dbname = "pendaftaran_siswa";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
