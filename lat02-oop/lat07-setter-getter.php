<!-- Disebut juga Accesor Method -->

<?php

class Produk
{
    private
        $judul,
        $penulis,
        $penerbit,
        $harga,
        $diskon = 0;


    // constructor otomatis berjalan ketika ada objek yang dibuat
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        // this merupakan keyword yang digunakan untuk mengambil variabel global kedalam lokal
    }

    public function setJudul($judul)
    {
        if (!is_string($judul)) {
            throw new Exception("Judul must be string!");
        }
        return $this->judul = $judul;
    }

    public function getJudul()
    {
        return $this->judul;
    }

    public function setPenulis($penulis)
    {
        return $this->penulis = $penulis;
    }

    public function getPenulis()
    {
        return $this->penulis;
    }

    public function setPenerbit($penerbit)
    {
        return $this->penerbit = $penerbit;
    }

    public function getPenerbit()
    {
        return $this->penerbit;
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

    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

    public function getDiskon()
    {
        return $this->diskon;
    }

    public function setHarga($harga)
    {
        return $this->harga = $harga;
    }

    public function getHarga()
    {
        $price = $this->harga - ($this->harga * $this->diskon / 100);
        return "Rp. $price";
    }
}

class Komik extends Produk
{
    public $jmlHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        // mengambil construct parentnya di class Produk agar variabel yang sama tidak perlu di inisialisasi kembali dengan keyword $this
        // cukup variabel baru yang berbeda saja
        // tidak perlu di isi nilai default juga, karena akan menimpa parentnya
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
echo "<hr>";

// Harga
// $produk2->diskon = 50;
// tidak bisa menggunakan cara diatas karena properti diskon sudah protected, hanya bisa di akses oleh child dan parentnya
$produk2->setDiskon(50);
echo $produk2->getHarga();
echo "<hr>";

// Judul Baru 
$produk1->setJudul("Boruto");
echo $produk1->getJudul();
