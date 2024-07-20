<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("location : lat07-login.php");
    exit;
    // bila session login tidak ada, maka tendang user kembali ke halaman login
}
require 'lat02-function.php'; 


// Pagination
// Konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahdata = count(query("SELECT * FROM siswa"));
// count untuk menghitung jumlah data yang ada di dalam array
$jumlahHalaman = ceil($jumlahdata/$jumlahDataPerHalaman);
// ceil membulatkan data ke angka diatasnya, contoh 1,2 dibulatkan menjadi 2
// ada juga floor untuk membulatkan kebawah


// Ternary Operator
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// Jika variabel halaman ada di URL, maka set variabel halaman kedalam $halamanAktif, jika tidak maka set 1

// konfigurasi jumlah data per halaman
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
// Awal data dimulai dari index ke 0, dengan logika di atas, maka setiap page akan menampilkan data sesuai indexnya


$siswa = query("SELECT * FROM siswa LIMIT $awalData, $jumlahDataPerHalaman");
// Buat array dengan nama variabel bebas (contoh : $siswa)
// variabel ini menampung seluruh data dari database tabel siswa yang berbentuk array
// Limit membutuhkan 2 nilai
// nilai pertama mengambil data berdasarkan index (contoh diatas index 1, 1 merupakan data kedua setelah 0)
// nilai kedua banyaknya data


// Ketika tombol cari ditekan
if(isset($_POST["cari"])){
    $siswa = cari($_POST["search"]);
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
</head>
<body>
    <h1>Daftar Siswa DTA/TPA</h1>

    <a href="lat03-tambah.php">Tambah data siswa</a><br><br>

    <!-- Searching data siswa -->
    <form action="" method="post">
        <input type="text" name="search" size="40" placeholder="Masukkan nama pencarian" autofocus autocomplete="off">
        <!-- autofocus untuk mengaktifkan input secara otomatis, autocomplete="off" untuk menghapus riwayat pencarian  -->
        <button type="submit" name="cari">Cari</button>
    </form>
    <br><br>


    <!-- navigasi -->
    <!-- Menampilan tombol back -->
    <?php if($halamanAktif > 1) : ?>
        <!-- jika halamannya kurang dari 1, maka tombol back tidak akan muncul -->
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&lt;</a>
        <!-- jika tombol lt/lower than di klik, makan halaman akan -1 dan pindah halaman 
        bisa juga %lt diganti %laquo/left arrow-->
    <?php endif; ?>

        <!-- tampilkan jumlah halaman -->
    <?php for($i = 1; $i <= $jumlahHalaman; $i++): ?>
        <?php if( $i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
        <!-- kirim variabel halaman ke URL dengan nilai dari for $jumlahHalaman -->

        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <!-- Menampilan tombol next -->
    <?php if($halamanAktif < $jumlahHalaman) : ?>
        <!-- jika halamannya lebih dari jumlahHalaman, maka tombol next tidak akan muncul -->
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&gt;</a>
        <!-- jika tombol gt/greater than di klik, makan halaman akan +1 dan pindah halaman 
        bisa juga %gt diganti %raquo/right arrow-->
    <?php endif; ?>


    <br><br>
    <a href="lat08-logout.php">Logout</a>
    <br><br>



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
</body>
</html>