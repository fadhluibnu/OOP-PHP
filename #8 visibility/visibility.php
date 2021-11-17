<?php

// membuat toko komik dan game
//constructor bisa digunakan untuk menyingkat pembuatan objek

class Produk
{
    public $judul = "penulis",
        $penulis = "penulis",
        $penerbit = "penerbit";
    protected $diskon = 0;

    // jika inigin menyimpan propertynya di class child nya maka pake protected
    private $harga = 0;

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

    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
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
    public $jumlahHalaman;

    public function __construct($judul, $penulis, $penerbit, $harga, $jumlahHalaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jumlahHalaman = $jumlahHalaman;
    }

    public function getInfoProduk()
    {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jumlahHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk
{
    public $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

    public function getInfoProduk()
    {
        $str = "Game : " . parent::getInfoProduk() . "- {$this->waktuMain} Menit.";
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


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Mobile Legends", "Moonton", "Moonton", 35000, 20);

// Komik : Naruto | Mashashi kishimoto, Shonen Jump (Rp. 30000) - 100 Halaman.
// Game : Moonton | Moonton, Moonton (Rp. 40000) - 20 Menit.

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

$produk2->setDiskon(50);
echo $produk2->getHarga();















// echo "Komik : " . $produk1->getLabel();
// echo "<br>";
// echo "Game : " . $produk2->getLabel();

// menjalankan method cetak
// $infoProduk1 = new CetakInfoProduk();
// echo "<br>";
// echo $infoProduk1->cetak($produk1);
