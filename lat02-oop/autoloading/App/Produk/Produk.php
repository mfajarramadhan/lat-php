<?php

abstract class Produk
// class abstract
{
    protected
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

    abstract public function getInfoProduk();
    // method abstract

    abstract public function getInfo();


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
