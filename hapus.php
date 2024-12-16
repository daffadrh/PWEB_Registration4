<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM calon_siswa WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data siswa berhasil dihapus.";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
