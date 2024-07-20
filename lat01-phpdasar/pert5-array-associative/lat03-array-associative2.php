<?php 
    $mahasiswa = [
        [
        "nama" => "Muhammad Fajar",
        "npm" => "4337857201220003",
        "jurusan" => "Sistem Informasi",
        "email" => "mfajarramadhan04@gmail.com",
        "gambar" => "akhi2.jpg"
        ],
        [
        "nama" => "Aisyah",
        "npm" => "43378572012200015",
        "jurusan" => "Sistem Informasi",
        "email" => "aisyah@gmail.com",
        "gambar" => "ukhty2.jpg"
        ]
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Associative</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
            <li>
                <img src="img/<?= $mhs["gambar"]; ?>">
            </li>
            <li>Nama : <?php echo $mhs["nama"]; ?></li>
            <li>NPM : <?php echo $mhs["npm"]; ?></li>
            <li>Jurusan : <?php echo $mhs["jurusan"]; ?></li>
            <li>Email : <?php echo $mhs["email"]; ?></li>
            <!-- Gunakan variabel $mhs untuk memanggil elemennya, bukan pembungkusnya var $mahasiswa -->
    </ul>
    <?php endforeach; ?>
</body>
</html>
</body>
</html>