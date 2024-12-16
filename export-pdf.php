<?php
require('fpdf/fpdf.php');
include('config.php');

// Membuat instance FPDF
$pdf = new FPDF();
$pdf->SetAutoPageBreak(true, 10);
$pdf->AddPage();

// Menambahkan judul
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(200, 10, 'Daftar Siswa Yang Telah Mendaftar', 0, 1, 'C');

// Menambahkan tabel
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Nama', 1);
$pdf->Cell(50, 10, 'Alamat', 1);
$pdf->Cell(30, 10, 'Jenis Kelamin', 1);
$pdf->Cell(30, 10, 'Agama', 1);
$pdf->Cell(30, 10, 'Sekolah Asal', 1);
$pdf->Ln();

// Mengambil data siswa dari database
$sql_siswa = "SELECT * FROM calon_siswa";
$result_siswa = $conn->query($sql_siswa);

// Menampilkan data siswa dalam tabel PDF
while ($row = $result_siswa->fetch_assoc()) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(10, 10, $row['id'], 1);
    $pdf->Cell(40, 10, $row['nama'], 1);
    $pdf->Cell(50, 10, $row['alamat'], 1);
    $pdf->Cell(30, 10, $row['jenis_kelamin'], 1);
    $pdf->Cell(30, 10, $row['agama'], 1);
    $pdf->Cell(30, 10, $row['sekolah_asal'], 1);
    $pdf->Ln();
}

// Output PDF ke browser
$pdf->Output();

// Menutup koneksi database
$conn->close();
?>
