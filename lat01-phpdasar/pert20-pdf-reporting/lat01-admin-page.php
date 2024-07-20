<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("location : lat07-login.php");
    exit;
    // bila session login tidak ada, maka tendang user kembali ke halaman login
}
require 'lat02-function.php';    
$siswa = query("SELECT * FROM siswa");
// Buat array dengan nama variabel bebas (contoh : $siswa)
// variabel ini menampung data dari database tabel siswa yang berbentuk array


// Ketika tombol cari ditekan
if(isset($_POST["cari"])){
    $siswa = cari($_POST["keyword"]);
    // var siswa akan berisi data hasil pencarian dari function cari()
    // function cari mendapat data dari apapun yang diketikan oleh user
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        .loader{
            width:50px;
            height:35px;
            position: absolute;
            top: 108px;
            top: 108px;
            left: 304px;
            z-index: -1;
            display: none;
        }

        @media print{
                .logout, .tambah, .form-cari, .aksi{
                    display: none;
                }
            }
    </style>
    <!-- file jQuery harus berada di atas file js kita -->
    <!-- Dengan jQuery, file js bisa disimpan di atas tanpa harus menunggu elemen html ready -->
    <!-- Halaman web membaca kode dari atas ke bawah & kiri ke kanan -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <h1>Daftar Siswa DTA/TPA</h1>

    <a href="lat03-tambah.php" class="tambah">Tambah data siswa</a><br>
    <a href="lat08-logout.php" class="logout">Logout</a><br><br>


    <!-- Searching data siswa -->
    <form action="" method="post" class="form-cari">
        <input type="text" name="keyword" size="40" placeholder="Masukkan nama pencarian" autofocus autocomplete="off" id="keyword">
        <!-- autofocus untuk mengaktifkan input secara otomatis, autocomplete="off" untuk menghapus riwayat pencarian  -->
        <button type="submit" name="cari" id="tombol-cari">Cari</button>

        <img src="img/loading.gif" alt="loading" class="loader">
    </form>
    <br>

    <!-- Container ini aka diganti isinya dengan isi dari file ajax -->
    <div id="container">
    <table border="1" cellpadding="10" cellspacing="0"  width="100%" style="text-align:center">
        <tr>
            <th>No.</th>
            <th class="aksi">Aksi</th>
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
            <td class="aksi">
                <a href="lat05-ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                <!-- mengirimkan id ke url yg akan ditangkap oleh GET di lat05  -->
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
    </div>
</body>
</html>