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

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 50000);
$produk2 = new Produk("Proramming Tips", "M. Fajar Ramadhan", "Pustaka", 40000);
$produk3 = new Produk("Dragon Ball");

echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Komik : " . $produk2->getLabel();
echo "<br>";
var_dump($produk3); 

?>