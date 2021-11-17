<?php

// membuat toko komik dan game


class Produk
{
    public $judul = "penulis",
        $penulis = "penulis",
        $penerbit = "penerbit",
        $harga = 0;

    // method
    public function getLabel()
    {
        // untuk mengakses property ditambah this->...
        return "$this->penulis, $this->penerbit";
    }
}


// $produk1 = new Produk();
// $produk1->judul = "Naruto";
// var_dump($produk1);

// $produk2 = new Produk();
// $produk1->judul = "Boruto";
// $produk2->tambahProperty = "WKWKWK";
// var_dump($produk2);


$produk3 = new Produk();
$produk3->judul = "Naruto";
$produk3->penulis = "Masashi Kishimoto";
$produk3->penerbit = "Shonen Jump";
$produk3->harga = 30000;

$produk4 = new Produk();
$produk4->judul = "Mobile Legends";
$produk4->penulis = "Moonton";
$produk4->penerbit = "Moonton";
$produk4->harga = 35000;


echo "Komik : " . $produk3->getLabel();
echo "<br>";
echo "Game : " . $produk4->getLabel();
