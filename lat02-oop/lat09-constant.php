<?php
// constant/konstanta terdapat 2 jenis, ada define dan const
// constant bernilai tetap 
// const bisa digunakan didalam class, define tidak
// berbeda dengan variable tidak menggunalan $



define("NAMA", "Fajar");
echo NAMA;

echo "<br>";

const UMUR = 20;
echo UMUR;
echo "<br>";
echo "<hr>";



// Magic Constant
echo __FILE__;
echo "<br>";
echo __LINE__;
// dan masih banyak magic constant lainnya
