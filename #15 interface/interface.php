<?php

// membuat toko komik dan game
//constructor bisa digunakan untuk menyingkat pembuatan objek

interface InfoProduk
{
    public function getInfoProduk();
}

abstract class Produk
{
    protected $judul,
        $penulis,
        $penerbit,
        $harga,
        $diskon;


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

    // contoh setter
    public function setJudul($judul)
    {
        if (!is_string($judul)) {
            throw new Exception("Judul harus string");
        }
        $this->judul = $judul;
    }

    // contoh getter
    public function getJudul()
    {
        return $this->judul;
    }

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function setPenulis($penulis)
    {
        $this->penulis = $penulis;
    }
    public function getPenulis()
    {
        return $this->penulis;
    }
    public function setPenerbit($penerbit)
    {
        $this->penerbit = $penerbit;
    }
    public function getPenerbit()
    {
        return $this->penerbit;
    }

    // method
    public function getLabel()
    {
        // untuk mengakses property ditambah this->...
        return "$this->penulis, $this->penerbit";
    }
    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }
    public function getDiskon()
    {
        return $this->diskon;
    }

    // menampilkan semua info dari produk
    abstract public function getInfo();
}



class Komik extends Produk implements InfoProduk
{
    public $jumlahHalaman;

    public function __construct($judul, $penulis, $penerbit, $harga, $jumlahHalaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jumlahHalaman = $jumlahHalaman;
    }
    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }

    public function getInfoProduk()
    {
        $str = "Komik : " . $this->getInfo() . " - {$this->jumlahHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk implements InfoProduk
{
    public $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }
    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }

    public function getInfoProduk()
    {
        $str = "Game : " . $this->getInfo() . "- {$this->waktuMain} Menit.";
        return $str;
    }
}


class CetakInfoProduk
{
    public $daftarProduk = array();

    public function TambahProduk(Produk $produk)
    {
        $this->daftarProduk[] = $produk;
    }

    // jadi jika ditambahkan class, maka fungsi cetak hanya bisa digunakan oleh class tersebut
    public function cetak()
    {
        $str = "DAFTAR PRODUK <br>";

        foreach ($this->daftarProduk as $p) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }

        return $str;
    }
}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Mobile Legends", "Moonton", "Moonton", 35000, 20);


$cetakProduk = new CetakInfoProduk();
$cetakProduk->TambahProduk($produk1);
$cetakProduk->TambahProduk($produk2);

echo $cetakProduk->cetak();
