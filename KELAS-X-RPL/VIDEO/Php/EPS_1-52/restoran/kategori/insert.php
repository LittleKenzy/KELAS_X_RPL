<form action="" method="post">
    <label for="">Kategori: </label>
    <input type="text" name="kategori" id="">
    <br>
    <input type="submit" name="simpan" id="" value="Simpan">
</form>

<?php

require_once '../function.php';

if (isset($_POST['simpan'])) {
    $kategori = $_POST['kategori'];
    $sql = "INSERT INTO tblkategori VALUES (NULL, '$kategori')";
    $result = mysqli_query($koneksi, $sql);
    echo 'Data sudah disimpan.';

    header('location:http://kelas_x_rpl.test/KELAS-X-RPL/VIDEO/Php/EPS_1-52/restoran/kategori/select.php');

}

?>