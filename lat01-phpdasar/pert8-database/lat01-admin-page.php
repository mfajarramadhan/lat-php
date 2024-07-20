<?php 
require 'lat02-function.php';    
$siswa = query("SELECT * FROM siswa");
// Buat array dengan nama variabel bebas (contoh : $siswa)
// variabel ini menampung data dari database tabel siswa
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>Daftar Siswa DTA/TPA</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alamat</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($siswa as $row) : ?>
            <!-- Buat pengulangan untuk memunculkan semua data dari awal sampai akhir -->
            <!-- buat variabel baru bebas (contoh : $row) untuk menyimpan data dari lemari ($result) -->
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="">Ubah</a> |
                <a href="">Hapus</a>
            </td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["kelas"]; ?></td>
            <td><?= $row["alamat"]; ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>
</html>