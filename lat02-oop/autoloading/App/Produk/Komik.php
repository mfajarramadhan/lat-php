<?php

class Komik extends Produk implements InfoProduk
// Class komik mewarisi semua method dan properti class Produk dan juga mengimplementasikan interface InfoProduk

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
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman";
        return $str;
        // function getInfoProduk() di dalam variabel $str memanggil function getInfoProduk() di dalam class Produk
        // hal ini dinamakan overriding dengan menggunakan keyword parent, karena keyword parent bukan variabel maka menggunakan operator concat (.)
        // jika tidak menggunakan keyword parent, maka function getInfoProduk() di dalam variabel $str akan memanggil getInfoProduk di dalam class Komik
        // dia akan terus menerus memanggil dirinya sendiri (rekursif), maka akan error
    }

    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
    // function getInfo ini merupakan implementasi dari abstract method getInfo di abstract class Produk
    // ubah properti di abstract class menjadi protected agar bisa di akses oleh method ini
}
