<?php


// tidak menggunakan this karena property tidak di instasiasi
// class ContohStatic
// {
//     public static $angka = 1;

//     public static function halo()
//     {
//         return "Hallo " . self::$angka . " Kali.";
//     }
// }

// echo ContohStatic::$angka;
// echo "<br>";
// echo ContohStatic::halo();
// echo "<hr>";
// echo ContohStatic::halo();




class Contoh
{
    public static $angka = 1;
    public function halo()
    {
        return "Hallo " . static::$angka++ . " Kali. <br>";
    }
}

$obj = new Contoh;
echo $obj->halo();
echo $obj->halo();
echo $obj->halo();

echo "<hr>";

$obj2 = new Contoh;
echo $obj2->halo();
echo $obj2->halo();
echo $obj2->halo();
