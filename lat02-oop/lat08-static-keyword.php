<?php
class ContohStatic
{
    public static $angka = 1;
    public static function halo()
    {
        return "Halo " . self::$angka++ . " kali";
    }
}

echo ContohStatic::$angka;
echo "<br>";
echo ContohStatic::halo();
echo "<br>";
echo ContohStatic::halo();

// Static keyword:
// digunakan untuk fungsi bantuan
// digunakan di class utility pada Framework
// terikat dengan class bukan object
