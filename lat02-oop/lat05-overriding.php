<?php

class Produk
{
    public
        $judul,
        $penulis,
        $penerbit,
        $harga;

    // constructor otomatis berjalan ketika ada objek yang dibuat
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
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
    public $jmlHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        // mengambil construct parentnya di class Produk agar variabel yang sama tidak perlu di inisialisasi kembali dengan keyword $this
        // cukup variabel baru saja
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman";
        return $str;
        // function getInfoProduk() di dalam variabel $str memanggil function getInfoProduk() di dalam class Produk
        // hal ini dinamakan overriding dengan menggunakan keyword parent, karena keyword parent bukan variabel maka menggunakan operator concat (.)
        // jika tidak menggunakan keyword parent, maka function getInfoProduk() di dalam variabel $str akan memanggil getInfoProduk di dalam class Komik
        // dia akan terus menerus memanggil dirinya sendiri (rekursif), maka akan error
    }
}

class Game extends Produk
{
    public $waktuMain;
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }




    public function getInfoProduk()
    {
        $str = "Game : " . parent::getInfoProduk() . " ~ {$this->waktuMain} Jam";
        return $str;
    }
}

// Perlu parameter tambahan untuk membedakan atara game dan komik. Contohya parameter tipe
// Jika banyak kategori yg berbeda ada banyak, maka terjadi kompleksitas sangat merepotkan, perlu banyak parameter tambahan
// Maka dibutuhkan inheritance
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 50000, 100);
$produk2 = new Game("Uncaharted", "Neil Druckman", "Sony Computer", 40000, 50);

// Cetak 
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
