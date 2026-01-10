<form action="" method="POST">
    <label for="nis">Nis : </label>
    <input type="number" name="nis" id="nis" required placeholder="Masukkan NIS"><br>
    <label for="nama">Nama : </label>
    <input type="text" name="nama" id="nama" required placeholder="Masukkan Nama"><br>
    <label for="alamat">Alamat : </label>
    <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat"><br>
    <label for="telpon">Telepon : </label>
    <input type="text" name="telpon" id="telpon" placeholder="Masukkan Telepon"><br>

    <input type="submit" name="simpan" value="Simpan">
</form>




<?php

$db = 'dbsekolah';
$host = 'localhost';
$user = 'root';
$password = 'admin123';

$koneksi = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];

    $sql = "INSERT INTO tblsiswa (nis, nama, alamat, telpon) VALUES ($nis, '$nama', '$alamat', '$telpon')";
    echo $sql;
    $query = mysqli_query($koneksi, $sql);

}

$sql = "SELECT * FROM tblsiswa";
$query = mysqli_query($koneksi, $sql);



?>

<table border="1">
    <thead>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telpon</th>
        </tr>
    </thead>
    <tbody>


        <?php
        while ($siswa = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $siswa['nis'] ?></td>
                <td><?= $siswa['nama'] ?></td>
                <td><?= $siswa['alamat'] ?></td>
                <td><?= $siswa['telpon'] ?></td>
            </tr>

        <?php } ?>

    </tbody>
</table>

<?php ?>