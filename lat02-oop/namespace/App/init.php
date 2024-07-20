<?php

// require_once 'Produk/InfoProduk.php';
// require_once 'Produk/Produk.php';
// require_once 'Produk/Komik.php';
// require_once 'Produk/Game.php';
// require_once 'Produk/CetakInfoProduk.php';
// require_once 'Produk/User.php';
// require_once 'Service/User.php';

// Function Biasa :
// function autoload($class)
// {
// }
// spl_autoload_register(autoload());


// Function Closure/fungsi tanpa nama :
spl_autoload_register(function ($class) {
    // isi dari $class = App\Produk\User.php
    $class = explode('\\', $class);
    // setelah di explode, maka isi dari $class berubah menjadi array ["App", "Produk", "User"] dan backslash hilang "\"
    $class = end($class);
    // ambil index terakhir dari array $class yang berisi "User", maka variabel $class berisi string "User" 
    require_once __DIR__ . '/Produk/' . $class . '.php';
    // Panggil Produk/User.php versi lengkap pake __DIR__
});
// Memanggil file User.php di folder produk

spl_autoload_register(function ($class) {
    $class = explode("\\", $class);
    $class = end($class);
    require_once 'Service/' . $class . '.php';
});
// function ini otomatis memanggil namespace beserta kelas di dalam folder produk, bahkan jika membuat kelas baru otomatis akan terpanggil
