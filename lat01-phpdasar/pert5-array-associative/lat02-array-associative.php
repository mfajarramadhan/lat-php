<?php 
    // Array Multidimensi
    // $mahasiswa = [
    //     ["Muhammad Fajar", "4337857201220003", "Sistem Informasi", "mfajarramadha04@gmail.com"] , 
    //     ["Diva Destia Rohyadi", "4337857201220015", "Sistem Informasi", "divadestia@gmail.com"],
    //     ["Muhammad Hanif Solatan", "4337857201220012", "Sistem Informasi", "hanifsolatan@gmail.com"]
    // ];


    // Array Associative
    // definisinya sama seperti array numerik
    // key-nya adalah string yang kita buat sendiri
    // yang terpenting adalah key nya dan tidak harus berurutan
    // sedangkan array numerik yg penting adalah urutannya
    $mahasiswa = [
        [
        "nama" => "Muhammad Fajar",
        "npm" => "4337857201220003",
        "jurusan" => "Sistem Informasi",
        "email" => "mfajarramadhan04@gmail.com"
        // "nama" adalah key, "Muhammad Fajar" adalah value
        ],
        [
        "nama" => "Diva Destia",
        "npm" => "43378572012200015",
        "jurusan" => "Sistem Informasi",
        "email" => "divadestia@gmail.com",
        "tugas" => ["A", "B", "C"]
        ]
    ];

    echo $mahasiswa[1]["tugas"][1];
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