<?php
require 'lat02-function.php';
// menghubungkan file 

// Ambil data di URL
$id = $_GET["id"];

// query data berdasarkan id
// kareana kita punya array rows berupa array kosong
// function query dimasukkan ke array rows dan mengambil data dari table siswa dengan index ke 0 (elemen pertama)
$siswa = query("SELECT * FROM siswa WHERE id = $id")[0];
// var_dump($siswa["nama"]);
// kode diatas tinggal dimasukkan kedalam values pada setiap input dalam form
// untuk memunculkan data yg sudah di input sebelumnya 

    // Cek apakah tombol submit sudah ditekan atau belum
    if(isset($_POST["submit"])){
        
        // Ambil data dari variabel conn dan query
        // if(mysqli_affected_rows($conn) > 0){

        // Tidak memerlukan syntax diatas, diubah menjadi dibawah
        if(ubah($_POST) > 0){
            // data didalam elemen form diambil, dimasukkan ke function ubah dan dikirimkan melalui $_POST kemudian ditangkap oleh $data di lat02 
            // kemudian di cek apakah nilai post lebih besar dari 0 atau = 1 yg menandakan data berhasil diubah
            echo "
                <script>
                    alert('Data berhasil diubah')
                    document.location.href = 'lat01-admin-page.php';
                </script>
                ";
            }else{
                echo " 
                <script>
                    alert('Gagal merubah data');
                    document.location.href = 'lat01-admin-page.php';
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
    <title>Update Data Siswa</title>
</head>
<body>
    <h1>Update Data Mahasiswa</h1>
    <form action="" method="post">
        <ul>
                <input type="hidden" name="id" value="<?= $siswa["id"]; ?>">
                <!-- inputan yang tersembunyi sebagai primary key untuk patokan dalam merubah data -->
                <!-- id ini dikirimkan ke lat02 dan ditangkap oleh variabel data di function ubah($data) -->
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" value="<?= $siswa["nama"]; ?>" required>
            </li>
            <li>
                <label for="kelas">Kelas :</label>
                <input type="text" name="kelas" id="kelas" value="<?= $siswa["kelas"]; ?>" required>
            </li>
            <li>
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat" value="<?= $siswa["alamat"]; ?>" required>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="text" name="gambar" id="gambar" value="<?= $siswa["gambar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Update Data</button>
            </li>
        </ul>
    </form>
</body>
</html>