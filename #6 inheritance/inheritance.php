<?php

// membuat toko komik dan game
//constructor bisa digunakan untuk menyingkat pembuatan objek

class Produk
{
    public $judul = "penulis",
        $penulis = "penulis",
        $penerbit = "penerbit",
        $harga = 0,
        $waktuMain,
        $jumlahHalaman;

    // membuat constructor
    // method ini akan otomatis di jalankan
    // setiap objek di panggil, maka constructor juga akan ikut berjalan
    public function __construct($judul, $penulis, $penerbit, $harga, $jumlahHalaman = 0, $waktuMain = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->waktuMain = $waktuMain;
        $this->jumlahHalaman = $jumlahHalaman;
    }


    // method
    public function getLabel()
    {
        // untuk mengakses property ditambah this->...
        return "$this->penulis, $this->penerbit";
    }


    // menampilkan semua info dari produk
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
        $str = "Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jumlahHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk
{
    public function getInfoProduk()
    {
        $str = "Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->waktuMain} Menit.";

        return $str;
    }
}


class CetakInfoProduk
{
    // jadi jika ditambahkan class, maka fungsi cetak hanya bisa digunakan oleh class tersebut
    public function cetak(Produk $produk)
    {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);
$produk2 = new Game("Mobile Legends", "Moonton", "Moonton", 35000, 0, 20);

// Komik : Naruto | Mashashi kishimoto, Shonen Jump (Rp. 30000) - 100 Halaman.
// Game : Moonton | Moonton, Moonton (Rp. 40000) - 20 Menit.

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
















// echo "Komik : " . $produk1->getLabel();
// echo "<br>";
// echo "Game : " . $produk2->getLabel();

// menjalankan method cetak
// $infoProduk1 = new CetakInfoProduk();
// echo "<br>";
// echo $infoProduk1->cetak($produk1);
