<?php

//cara require
// require_once 'App/Produk/InfoProduk.php';
// require_once 'App/Produk/Produk.php';
// require_once 'App/Produk/Komik.php';
// require_once 'App/Produk/Game.php';
// require_once 'App/Produk/CetakInfoProduk.php';

// membuat file init pada foler app
require_once 'App/init.php';

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Mobile Legends", "Moonton", "Moonton", 35000, 20);


$cetakProduk = new CetakInfoProduk();
$cetakProduk->TambahProduk($produk1);
$cetakProduk->TambahProduk($produk2);

echo $cetakProduk->cetak();
