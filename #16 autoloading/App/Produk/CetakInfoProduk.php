<?php
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
