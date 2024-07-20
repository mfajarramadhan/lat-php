<?php 
// SUPERGLOBAL
// variable global milik PHP
// merupakan array associative


// mengecek apakah tidak ada data di $_GET
// // Apakah $_GET["nama"] sudah pernah dibuat atau belum
// if( !isset($_GET["nama"]) || atau
//     !isset($_GET["npm"]) ||
//     !isset($_GET["jurusan"]) ||
//     !isset($_GET["email"]) ||
//     !isset($_GET["gambar"])){
//     header("Location: lat01-get.php");
//     exit;
// }
    // Ketika $_GET["nama"] belum di set atau jIka ada yg kosong di url, paksa user untuk pindah ke halaman lat01
    // hal ini mencegah user jahat untuk membuka halaman 2 secara langsung 
    // sangat berguna ketika membuat login page
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
        "jurusan" => "Informatika",
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
    <title>Get</title>
</head>
<body>
    <!-- GET mengirim data melalui url -->
    <!-- POST mengirim data dibelakang layar tidak melalui url  -->

    <ul>
    <?php foreach($mahasiswa as $mhs): ?>
        <li><a href="lat02-get2.php?nama=<?php echo $mhs["nama"]; ?>&npm=<?php echo $mhs["npm"];?>&jurusan=<?php echo $mhs["jurusan"];?>&email=<?php echo $mhs["email"];?>&gambar=<?php echo $mhs["gambar"];?>"><?php echo $mhs["nama"] ?></a></li>
        <!-- fungsi tag ? untuk mengirimkan data ke url, contoh diatas:
        data berupa key nama,npm,jurusan,email,dan gambar berisi elemen Mahasiswa yang direpresentasikan oleh variabel $mhs dalam tag php.
        data tersebut akan dikirimkan ke url dan ditangkap url nya menggunakan variabel superglobal $_GET -->
        <?php endforeach; ?>
    </ul>
</body>
</html>