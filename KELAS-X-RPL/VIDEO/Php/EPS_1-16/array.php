<?php 

//array dimensi
// $nama = array("Andi", "Budi", "Caca", "Dodi", 100, 2.5);

// var_dump($nama);

// echo '<br>';

// echo $nama[2]; // Caca

// echo '<br>';

// for ($i=0; $i < 6 ; $i++) { 
//     echo "Nama index ke-$i adalah ".$nama[$i]." <br>";
// }


// foreach ($nama as $key) {
//     echo "Nama: $key <br>";
// }



// array asosiatif
// $nama = array(
//     'joni' => 'surabaya',
//     'budi' => 'jakarta raya',
//     'andi' => 'bandung',
//     'caca' => 'medan'
// );

$nama['joni'] = 'surabaya';
$nama['budi'] = 'jakarta raya';
$nama['andi'] = 'bandung';
$nama['caca'] = 'medan';

var_dump($nama);

echo '<br>';

echo $nama['budi']; // jakarta raya

foreach ($nama as $key => $value) {
    echo $key. " => " . $value . " <br>";
}

?>