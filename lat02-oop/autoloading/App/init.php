<?php

// require_once 'Produk/InfoProduk.php';
// require_once 'Produk/Produk.php';
// require_once 'Produk/Komik.php';
// require_once 'Produk/Game.php';
// require_once 'Produk/CetakInfoProduk.php';


// Function Biasa :
// function autoload($class)
// {
// }
// spl_autoload_register(autoload());


// Function Closure/fungsi tanpa nama :
spl_autoload_register(function ($class) {
    require_once 'Produk/' . $class . '.php';
});
// function ini otomatis memanggil kelas di dalam folder produk, bahkan jika membuat kelas baru otomatis akan terpanggil
