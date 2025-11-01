<?php 

require_once '../function.php';
$sql = "SELECT * FROM tblkategori WHERE idkategori = $id";
$result = mysqli_query($koneksi, $sql);

$row = mysqli_fetch_assoc($result);

// echo ' ', $row['kategori'];

// $kategori = 'jelly bean';
// $id = 18;

// $sql = "UPDATE tblkategori SET kategori = '$kategori' WHERE idkategori = '$id'";

// $result = mysqli_query($koneksi, $sql);

// echo $sql;




?>

<form action="" method="post">
    <label for="">Kategori: </label>
    <input type="text" name="kategori" id="" value="<?php echo $row['kategori']; ?>">
    <br>
    <input type="submit" name="simpan" id="" value="simpan">
</form>

<?php 


if(isset($_POST['simpan'])) {
    $kategori = $_POST['kategori'];

    $sql = "UPDATE tblkategori SET kategori = '$kategori' WHERE idkategori = '$id'";

    $result = mysqli_query($koneksi, $sql);

    header('location:http://kelas_x_rpl.test/KELAS-X-RPL/VIDEO/Php/EPS_1-52/restoran/kategori/select.php');
}

?>