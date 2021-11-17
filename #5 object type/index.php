<?php

// membuat toko komik dan game
//constructor bisa digunakan untuk menyingkat pembuatan objek

class Produk
{
    public $judul = "penulis",
        $penulis = "penulis",
        $penerbit = "penerbit",
        $harga = 0;

    // membuat constructor
    // method ini akan otomatis di jalankan
    // setiap objek di panggil, maka constructor juga akan ikut berjalan
    public function __construct($judul, $penulis, $penerbit, $harga)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }


    // method
    public function getLabel()
    {
        // untuk mengakses property ditambah this->...
        return "$this->penulis, $this->penerbit";
    }
}

class CetakInfoProduk
{
    // jadi juka ditambahkan class, maka fungsi cetak hanya bisa digunakan oleh class tersebut
    public function cetak(Produk $produk)
    {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}


$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$produk2 = new Produk("Mobile Legends", "Moonton", "Moonton", 35000);


echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();

// menjalankan method cetak
$infoProduk1 = new CetakInfoProduk();
echo "<br>";
echo $infoProduk1->cetak($produk1);
