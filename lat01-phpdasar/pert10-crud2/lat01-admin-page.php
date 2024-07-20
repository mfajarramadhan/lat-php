<?php 
require 'lat02-function.php';    
$siswa = query("SELECT * FROM siswa");
// Buat array dengan nama variabel bebas (contoh : $siswa)
// variabel ini menampung data dari database tabel siswa yang berbentuk array
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

    <a href="lat03-tambah.php">Tambah data siswa</a><br><br>

    <table border="1" cellpadding="10" cellspacing="0"  width="100%" style="text-align:center">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>Gambar</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($siswa as $row) : ?>
            <!-- Buat pengulangan untuk memunculkan semua data dari awal sampai akhir -->
            <!-- buat variabel baru bebas (contoh : $row) untuk merepresentasikan data dari array $siswa -->
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="lat05-ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                <a href="lat04-hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('apakah yakin menghapus data ini?')">Hapus</a>
                <!-- mengirimkan id ke url yg akan ditangkap di lat04 dan menjalankan fungsi di lat04  -->
                <!-- menampilkan jendela konfirmasi ke user -->
            </td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["kelas"]; ?></td>
            <td><?= $row["alamat"]; ?></td>
            <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="50" height="100"></td>
            <!-- menangkap data di url yg dikirimkan oleh $data karena parameternya data di lat02.function.php. Sebelumnya adalah $_POST -->
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>
</html>