<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <ul>
        <li><img src="img/<?php echo $_GET["gambar"]; ?>" alt=""></li>
        <li><?php echo $_GET["nama"]; ?></li>
        <li><?php echo $_GET["npm"]; ?></li>
        <li><?php echo $_GET["jurusan"]; ?></li>
        <li><?php echo $_GET["email"]; ?></li>
        <!-- $_GET menangkap isi dari data yg ada di url yg  dikirimkan oleh tag tanda tanya ? 
        contoh diatas key gambar, nama, npm, jurusan, email  -->
    </ul>

    <p><a href="lat01-get.php">Back to previous page</a></p>


</body>
</html>