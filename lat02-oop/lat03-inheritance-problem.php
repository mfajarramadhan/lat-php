<?php

class Produk
{
    public  $judul,
        $penulis,
        $penerbit,
        $harga,
        $jmlHalaman,
        $waktuMain,
        $tipe;

    // constructor otomatis berjalan ketika ada objek yang dibuat
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0, $tipe)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
        $this->tipe = $tipe;

        // this merupakan keyword yang digunakan untuk mengambil variabel global kedalam lokal
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap()
    {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        // Cetak parameter tipe berdasarkan kategori apakah komik atau game
        if ($this->tipe == "Komik") {
            $str .= " - {$this->jmlHalaman} Halaman";
        } else if ($this->tipe == "Game") {
            $str .= " ~ {$this->waktuMain} Jam";
        }
        return $str;
    }
}

// Perlu parameter tambahan untuk membedakan atara game dan komik. Contohya parameter tipe
// Jika banyak kategori yg berbeda ada banyak, maka terjadi kompleksitas sangat merepotkan, perlu banyak parameter tambahan
// Maka dibutuhkan inheritance
$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 50000, 100, 0, "Komik");
$produk2 = new Produk("Uncaharted", "Neil Druckman", "Sony Computer", 40000, 0, 50, "Game");

// Cetak 
echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
