<?php 
    // Array Multidimensi
    $mahasiswa = [
        ["Muhammad Fajar", "4337857201220003", "Sistem Informasi", "mfajarramadha04@gmail.com"] , 
        ["Diva Destia Rohyadi", "4337857201220015", "Sistem Informasi", "divadestia@gmail.com"],
        ["Muhammad Hanif Solatan", "4337857201220012", "Sistem Informasi", "hanifsolatan@gmail.com"]
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Multidimensi</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <!-- Buat tag php nya diluar ul agar setiap data memiliki jarak 1 baris -->
    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <!-- <li>Muhammad Fajar</li>
        <li>4337857201220003</li>
        <li>Sistem Informasi</li>
        <li>mfajarramadha04@gmail.com</li> -->
            <li>Nama : <?php echo $mhs[0]; ?></li>
            <li>NPM : <?php echo $mhs[1]; ?></li>
            <li>Jurusan : <?php echo $mhs[2]; ?></li>
            <li>Email : <?php echo $mhs[3]; ?></li>
            <!-- Gunakan variabel $mhs untuk memanggil elemennya, bukan pembungkusnya var $mahasiswa -->
    </ul>
    <?php endforeach; ?>
</body>
</html>