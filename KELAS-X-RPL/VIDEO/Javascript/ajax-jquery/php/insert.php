<?php

$data = stripslashes(file_get_contents('php://input'));
$dataPelanggan = json_decode($data, true);

$pelanggan = $dataPelanggan['pelanggan'];
$alamat = $dataPelanggan['alamat'];
$telp = $dataPelanggan['telp'];

if (!empty($pelanggan) and !empty($alamat) and !empty($telp)) {
    $sql = "INSERT INTO tblpelanggan VALUES (NULL, '$pelanggan', '$alamat', '$telp')";
    if ($result = mysqli_query($conn, $sql)) {
        echo 'data sudah disimpan ! ';

    } else {
        echo 'data gagal disimpan ! ';
    }
} else {
    echo 'data kosong';
}



?>