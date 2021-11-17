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
        $jumlahHalaman,
        $tipe;

    // membuat constructor
    // method ini akan otomatis di jalankan
    // setiap objek di panggil, maka constructor juga akan ikut berjalan
    public function __construct($judul, $penulis, $penerbit, $harga, $jumlahHalaman = 0, $waktuMain = 0, $tipe = "")
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->waktuMain = $waktuMain;
        $this->jumlahHalaman = $jumlahHalaman;
        $this->tipe = $tipe;
    }


    // method
    public function getLabel()
    {
        // untuk mengakses property ditambah this->...
        return "$this->penulis, $this->penerbit";
    }


    // menampilkan semua info dari produk
    public function getInfoLengkap()
    {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        if ($this->tipe == "Komik") {
            $str .= " - {$this->jumlahHalaman} Halaman.";
        } elseif ($this->tipe == "Game") {
            $str .= " - {$this->waktuMain} Menit";
        }

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


$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0, "Komik");
$produk2 = new Produk("Mobile Legends", "Moonton", "Moonton", 35000, 0, 20, "Game");

// Komik : Naruto | Mashashi kishimoto, Shonen Jump (Rp. 30000) - 100 Halaman.
// Game : Moonton | Moonton, Moonton (Rp. 40000) - 20 Menit.

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
















// echo "Komik : " . $produk1->getLabel();
// echo "<br>";
// echo "Game : " . $produk2->getLabel();

// menjalankan method cetak
// $infoProduk1 = new CetakInfoProduk();
// echo "<br>";
// echo $infoProduk1->cetak($produk1);
