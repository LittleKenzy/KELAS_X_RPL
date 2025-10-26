<?php

// operator matematika
$a = 2;
$b = 2;



$c = $a + $b; // penjumlahan

echo "Hasil dari $a + $b = $c <br>";

$c = $a - $b; // pengurangan

echo "Hasil dari $a - $b = $c <br>";

$c = $a * $b; // perkalian

echo "Hasil dari $a * $b = $c <br>";

$c - $a / $b; // pembagian
echo floor("Hasil dari $a / $b = $c <br>"); // floor untuk pembulatan kebawah

$c = $a % $b; // modulus / sisa bagi
echo "Hasil dari $a % $b = $c <br>";

// operator logika
$c = $a < $b; // kurang dari
echo "Hasil dari $a < $b = $c <br>"; // hasil 1 = true, 0 = false

$c = $a > $b; // lebih dari
echo "Hasil dari $a > $b = $c <br>"; // hasil

$c = $a == $b; // sama dengan
echo "Hasil dari $a == $b = $c <br>"; // hasil

$c = $a != $b; // tidak sama dengan
echo "Hasil dari $a != $b = $c <br>"; // hasil

// increment
$a++; // nilai $a akan bertambah 1
echo "Nilai a sekarang adalah $a <br>";

// decrement
$a--; // nilai $a akan berkurang 1
echo "Nilai a sekarang adalah $a <br>";

// operator string
$kata = `Sura`;
$kota = `baya`;

$hasil = $kata . $kota; // penggabungan string

$hasil =$hasil.` KOTA PAHLAWAN`; // penggabungan string dengan assignment
echo "Hasil dari penggabungan $kata dan $kota adalah $hasil <br>";
?>