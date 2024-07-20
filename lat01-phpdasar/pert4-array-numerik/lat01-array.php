<?php 
    // array
    // variabel dapat memiliki banyak nilai
    // elemen array boleh memiliki tipe data yang berbeda
    // elemen array dimulai dari index ke 0
    $hari = ["Senin", "Selasa", "Rabu"];
    $bulan = ["Januari", "Februari", "Maret"];

    // Menampilkan array menggunakan var_dumb() atau print_r()
    // echo tidak bisa digunakan untuk mencetak array
    // var_dump menampilkan tipe data beserta key dan valuenya
    // print_r hanya key dan value saja
    // cek hasilnya di view page source
    var_dump($hari);
    echo "<br>";
    print_r($bulan);

    // Maenampilkan 1 elemen array saja
    echo $hari[1];
    echo "<br>";

    // Menambahkan elemen baru pada array
    $hari[] = "Kamis";
    var_dump($hari);

    // var_dump dan print_r bukan ditampilkan untuk user (versi debugging), hanya untuk developer
    // gunakan pengulangan untuk ditampilkan kepada user 
?>