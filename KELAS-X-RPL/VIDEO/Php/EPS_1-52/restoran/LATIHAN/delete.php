<?php 

require_once '../function.php';

$sql = "DELETE FROM tblkategori WHERE idkategori = $id";

$result = mysqli_query($koneksi, $sql);

header('location:http://kelas_x_rpl.test/KELAS-X-RPL/VIDEO/Php/EPS_1-52/restoran/kategori/select.php');



?>