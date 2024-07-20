<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location : lat07-login.php");
    exit;
    // bila session login tidak ada, maka tendang user kembali ke halaman login

}
require 'lat02-function.php';
// menghubungkan file 

    // Cek apakah tombol submit sudah ditekan atau belum
    if(isset($_POST["submit"])){
        // var_dump($_FILES); die;
        // $_FILES berfungsi untuk mengelola input form bertipe file
        // die berfungsi untuk menonaktifkan kode dibawahnya, jadi kode dibawah tidak di eksekusi

        
        // Ambil data dari variabel conn dan query
        // if(mysqli_affected_rows($conn) > 0){

        // Tidak memerlukan syntax diatas, diubah menjadi dibawah
        if(tambah($_POST) > 0){
            // data didalam elemen form diambil, dimasukkan ke function tambah dan dikirimkan melalui $_POST kemudian ditangkap oleh $data di lat02 
            // kemudian di cek apakah nilai post lebih besar dari 0 atau = 1 yg menandakan data berhasil ditambahkan
            
            echo "
                <script>
                    alert('Data berhasil ditambahkan')
                    document.location.href = 'lat01-admin-page.php';
                </script>
                ";
            }else{
                echo " 
                <script>
                    alert('Gagal menambahkan data');
                    document.location.href = 'lat03-tambah.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- enctype berfungsi untuk membuat jalur lain dalam mengelola inputan berupa file/gambar -->
        <!-- enctype digunakan untuk menangani file agar ditangani oleh $_FILES bukan $_POST lagi -->

        <ul>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="kelas">Kelas :</label>
                <input type="text" name="kelas" id="kelas" required>
            </li>
            <li>
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat" required>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>