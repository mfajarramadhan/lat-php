<?php 
    // User Defined Function 
    // Function buatan kita sendiri yang harus dibuat sebelum dipanggil dan namanya bebas
    function salam($waktu = "Datang", $nama = "Fajar"){
        return "Selamat $waktu, $nama!";
    }
    // "Datang" dan "Fajar" merupakan nilai default dari variabel waktu dan nama
    // Jika parameter berisi nilai, maka nilai default akan ditimpa
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>
<body>
    <h1><?php echo salam("Pagi"); ?></h1>
     <!-- Jika parameter tidak ada nilai, maka nilai default akan dipanggil -->
</body>
</html>