<?php 

class Produk{
    public  $judul,
            $penulis,
            $penerbit,
            $harga;

    // constructor otomatis berjalan ketika ada objek yang dibuat
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        // this merupakan keyword yang digunakan untuk mengambil variabel global kedalam lokal
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }
}

class CetakInfoProduk{
    // parameter Produk digunakan agar function cetak hanya boleh menerima class Produk 
    public function cetak(Produk $produk){
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 50000);
$produk2 = new Produk("Proramming Tips", "M. Fajar Ramadhan", "Pustaka", 40000);

echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Komik : " . $produk2->getLabel();
echo "<br>";

// cetak info produk
$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk1);
?>