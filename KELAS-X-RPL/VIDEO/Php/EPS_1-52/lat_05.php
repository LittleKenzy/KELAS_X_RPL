<?php

$tanggal = 34;

$hasil = $tanggal > 0;

echo "Hasil dari $tanggal > 0 adalah $hasil <br>";

if ($tanggal < 32) {
    if ($tanggal > 0) {
        echo "benar";
    } else {
        echo "salah";
    }
} else {
    echo "salah";
}

$nilai = 4;

// if ($nilai <= 100) {
//     if ($nilai >= 0) {
//         echo "nilai benar";
//     } else {
//         echo "nilai salah";
//     }
// } else {
//     echo "nilai salah";
// }

// if($nilai >= 0 && $nilai <=100) {
//     echo "nilai benar";
// } else {
//     echo "nilai salah";
// }

if($nilai >= 100 || $nilai <= 0) {
    echo "nilai salah";
} else {
    echo "nilai benar";
}


?>