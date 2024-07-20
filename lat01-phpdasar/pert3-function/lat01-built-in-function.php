<?php 
    // Built in function 
    // function yang sudah dibuatkan oleh php nya dan tinggal dipanggil
    // Cek php.net untuk dokumentasi
    echo date("l");
    echo "<br>";
    // Based on today, date butuh parameter minimal 1
    echo date("l, d-M-Y");
    echo "<br>";
    // Based on today, date, mount, year


    // Time
    // UNIX Timestamp / EPOCH time
    // detik sejak 1 Januari 1970
    // echo time();

    echo date("l", time()+60*60*24*2);
    echo "<br>";

    // menghitung 2 hari kedepan hari apa
    // tanggal hari ini berupa hari ditambah dengan jumlah detik dalam 2 hari kedepan


    // mktime
    // membuat detik sendiri
    // mktime(0,0,0,0,0,0)
    // jam, menit, detik, bulan, tanggal, tahun
    echo mktime(0,0,0,10,12,2004);
    echo "<br>";
    // menghitung detik dari 12 Oktober 2004 sampai saat ini
    echo date("l", mktime(0,0,0,10,12,2004));
    echo "<br>";
    // menghitung hari apa di 12 Oktober 2004 
?>