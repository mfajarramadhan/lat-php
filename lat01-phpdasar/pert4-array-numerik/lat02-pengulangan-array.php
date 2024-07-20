<?php 
    $angka = [3,2,15,20,11,77,89, 100];
    $angka[] = "200"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
    <style>
        .kotak {
            width : 50px;
            height : 50px;
            background-color : red;
            color : white;
            line-height : 50px;
            text-align : center;
            margin : 3px;
            float : left;
        }
        .clear { 
            clear : both; 
        }
    </style>
</head>
<body>
    <!-- panjang element array ada 8, bisa diganti menggunakan count($namavariabel)
        agar otomatis menambahkan jumlah element saat ada perubahan-->
    <?php for($i = 0; $i < count($angka); $i++){ ?>
    <div class="kotak"><?php echo $angka[$i]; ?></div>
    <?php } ?>
    <div class="clear"></div>
    <!-- Untuk membersihkan float agar tidak runtuh dan membuat garis baru -->



    <!-- foreach digunakan untuk merepresentasikan tiap tiap elemen array -->
    <!-- Setiap elemen di dalam variabel angka akan direpresentasikan oleh variabel a -->
    <!-- Jadi kita tidak perlu pusing memikirkan berapa kali harus mengulang -->
    <?php foreach($angka as $a){ ?>
        <div class="kotak"><?php echo $a; ?></div>
    <?php } ?>


    <div class="clear"></div>


    <!-- Penulisan gaya templating} -->
    <?php foreach($angka as $a): ?>
        <div class="kotak"><?= $a; ?></div>
    <?php endforeach; ?>
</body>
</html>