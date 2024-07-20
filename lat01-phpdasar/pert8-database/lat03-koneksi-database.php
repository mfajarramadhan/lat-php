<?php 
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "database_tpa");
    // (namahost, username, pw, database)

    // Ambil data dari tabel siswa / query data siswa
    $result = mysqli_query($conn, "SELECT * FROM siswa");
    // Syntax mysql gunakan huruf besar
    // result ibarat lemari, semua data didalam tabel siswa ibarat baju
    // jika ingin ambil bajunya saja bukan lemarinya, maka gunakan fetch
     
    // ambil data (fetch) siswa dari objek result
    // mysqli_fetch_row() mengambil data array numerik
    // mysqli_fetch_assoc() mengambil data array associative
    // mysqli_fetch_array() mengambil data array associative dan numerik, data jadi menumpuk (double)
    // mysqli_fetch_object() mengambil data object

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
            <th>Gambar</th>
        </tr>
        <?php $i = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
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
            <td><img src="img/<?= $row["gambar"] ?>" width="80" height="140" alt=""></td>
        </tr>
        <?php $i++ ?>
        <?php endwhile; ?>
    </table>
</body>
</html>