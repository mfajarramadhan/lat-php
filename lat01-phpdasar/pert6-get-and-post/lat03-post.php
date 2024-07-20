<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
     <?php if( isset($_POST["submit"])) : ?></h1>
        <h1>Halo, Selamat Datang <?php echo $_POST["nama"]; ?></h1>
    <?php endif; ?>
    <form action="" method="post">
        <!-- isi bagian action dengan "lat04-post2.php" untuk mengirim data ke halaman ini sendiri -->
        <!-- jika action kosong, maka data akan dikirim ke halaman ini sendiri
        jika method kosong, maka default method nya GET -->
        <!-- POST mengirim data dibelakang layar tidak melalui url  -->
        <!-- GET mengirim data melalui url -->
        Masukkan Nama :
        <input type="text" name="nama">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>