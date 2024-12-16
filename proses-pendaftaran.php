<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $kategori = $_POST['kategori']; // Menyimpan kategori (siswa/pegawai)
    
    if ($kategori == 'siswa') {
        $sekolah_asal = $_POST['sekolah_asal'];

        // Insert data siswa
        $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) 
                VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal')";
    } elseif ($kategori == 'pegawai') {
        $posisi = $_POST['posisi'];
        $gaji = $_POST['gaji'];

        // Menangani upload foto
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $foto_name = $_FILES['foto']['name'];
            $foto_tmp_name = $_FILES['foto']['tmp_name'];
            $foto_size = $_FILES['foto']['size'];
            $foto_ext = pathinfo($foto_name, PATHINFO_EXTENSION);
            $foto_target_dir = "uploads/";

            // Memastikan folder upload ada
            if (!is_dir($foto_target_dir)) {
                mkdir($foto_target_dir, 0777, true);
            }

            // Menentukan nama file foto baru
            $foto_new_name = uniqid() . "." . $foto_ext;
            $foto_target_file = $foto_target_dir . $foto_new_name;

            // Memindahkan file foto ke folder tujuan
            if (move_uploaded_file($foto_tmp_name, $foto_target_file)) {
                // Insert data pegawai termasuk foto
                $sql = "INSERT INTO pegawai (nama, alamat, jenis_kelamin, agama, posisi, gaji, foto) 
                        VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$posisi', '$gaji', '$foto_new_name')";
            } else {
                echo "Error mengunggah foto.";
                exit;
            }
        } else {
            // Jika foto tidak diunggah, insert data pegawai tanpa foto
            $sql = "INSERT INTO pegawai (nama, alamat, jenis_kelamin, agama, posisi, gaji) 
                    VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$posisi', '$gaji')";
        }
    }

    if ($conn->query($sql) === TRUE) {
        echo "Pendaftaran berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
