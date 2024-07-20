<?php

class Produk
{
    public  $judul,
        $penulis,
        $penerbit,
        $harga,
        $jmlHalaman,
        $waktuMain;

    // constructor otomatis berjalan ketika ada objek yang dibuat
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;

        // this merupakan keyword yang digunakan untuk mengambil variabel global kedalam lokal
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}

class Komik extends Produk
{
    public function getInfoProduk()
    {
        $str = "Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlHalaman} Halaman";
        return $str;
    }
}

class Game extends Produk
{
    public function getInfoProduk()
    {
        $str = "Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) ~ {$this->waktuMain} Jam";
        return $str;
    }
}

// Perlu parameter tambahan untuk membedakan atara game dan komik. Contohya parameter tipe
// Jika banyak kategori yg berbeda ada banyak, maka terjadi kompleksitas sangat merepotkan, perlu banyak parameter tambahan
// Maka dibutuhkan inheritance
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 50000, 100, 0);
$produk2 = new Game("Uncaharted", "Neil Druckman", "Sony Computer", 40000, 0, 50);

// Cetak 
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
