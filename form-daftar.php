<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa atau Pegawai Baru</title>
</head>
<body>
    <h1>Form Pendaftaran Siswa atau Pegawai Baru</h1>
    <form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br><br>
        
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" required><br><br>
        
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>
        
        <label for="agama">Agama:</label>
        <input type="text" name="agama" id="agama" required><br><br>
        
        <label for="kategori">Kategori Pendaftaran:</label>
        <select name="kategori" id="kategori" required>
            <option value="siswa">Siswa</option>
            <option value="pegawai">Pegawai</option>
        </select><br><br>

        <!-- Field untuk pendaftaran pegawai -->
        <div id="form-pegawai" style="display:none;">
            <label for="posisi">Posisi:</label>
            <input type="text" name="posisi" id="posisi"><br><br>

            <label for="gaji">Gaji:</label>
            <input type="number" name="gaji" id="gaji"><br><br>

            <label for="foto">Foto Pegawai:</label>
            <input type="file" name="foto" id="foto" accept="image/*"><br><br>
        </div>

        <button type="submit">Daftar</button>
    </form>

    <script>
        document.getElementById('kategori').addEventListener('change', function() {
            var kategori = this.value;
            if (kategori === 'pegawai') {
                document.getElementById('form-pegawai').style.display = 'block';
            } else {
                document.getElementById('form-pegawai').style.display = 'none';
            }
        });
    </script>
</body>
</html>
