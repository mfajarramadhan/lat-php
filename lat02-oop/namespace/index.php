<?php

require_once 'App/init.php';

// $produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 50000, 100);
// $produk2 = new Game("Uncaharted", "Neil Druckman", "Sony Computer", 40000, 50);

// $cetakProduk = new CetakInfoProduk();
// $cetakProduk->tambahProduk($produk1);
// $cetakProduk->tambahProduk($produk2);
// echo $cetakProduk->cetak();

// echo "<hr>";
use App\Produk\User as UserService;
use App\Service\User as ProdukUser;
// use adalah keyword yg digunakan untuk memilih ingin menggunakan namespace yg mana
// as adalah alias/menggantikan nama namespacenya

new UserService();
echo "<br>";
new ProdukUser();
