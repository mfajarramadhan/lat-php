<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Associative</title>
    <style>
        .kotak{
            width: 30px;
            height: 30px;
            background-color: red;
            color: white;
            text-align: center;
            line-height: 30px;
            margin: 3px;
            float: left;
            transition: all 1s;
        }
        .kotak:hover{
            transform: rotate(360deg);
        }
        .clear{
            clear: both;
        }
    </style>
</head>
<body>
    <?php 
        $angka = [
            [1,2,3],
            [4,5,6],
            [7,8,9]
        ];
    ?>

    <!-- Mencetak isi array multidimensi -->
    <div class="kotak"><?php echo $angka[1][2]; ?></div>
    <!-- Mencetak array di index ke 1, dan index ke 2, maka yg tercetak angka 6 -->
    <div class="clear"></div>
    <!-- Untuk membersihkan float agar tidak runtuh dan membuat garis baru -->


    <!-- Mencetak seluruh isi array multidimensi -->
    <?php foreach($angka as $a) :?>
        <?php foreach($a as $b) :?>
            <div class="kotak"><?php echo $b; ?></div>
        <?php endforeach; ?>
    <?php endforeach; ?>
    <!-- $angka adalah tas -->
    <!-- $a adalah tempat pensil -->
    <!-- $b adalah pensilnya/elemennya -->
</body>
</html>