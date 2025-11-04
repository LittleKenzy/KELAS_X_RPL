<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tblmenu WHERE idmenu = $id";
    $item = $db->getItem($sql);
    $idkategori = $item['idkategori'];
}
$row = $db->getAll("SELECT * FROM tblkategori ORDER BY idkategori ASC");

?>



<h1>Update Menu</h1>

<div class="mb-5">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 w-50">
            <label for="">Kategori</label>
            <select name="idkategori" id="" onchange="this.form.submit()">
                <?php foreach ($row as $r): ?>
                    <option <?php
                    if ($idkategori == $r['idkategori']) {
                        echo 'selected';
                    }
                    ?> value="<?php echo $r['idkategori']; ?>">
                        <?php echo $r['kategori']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3 w-50">
            <label for="">Nama Menu</label>
            <input type="text" name="menu" id="" required value="<?php echo $item['menu']; ?>" class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="">Harga</label>
            <input type="number" name="harga" id="" value="<?php echo $item['harga']; ?>" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="">Gambar</label>
            <input type="file" name="gambar" id="">
        </div>

        <div>
            <input type="submit" name="simpan" id="" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php

if (isset($_POST['simpan'])) {
    $idkategori = $_POST['idkategori'];
    $menu = $_POST['menu'];
    $harga = $_POST['harga'];
    $gambar = $item['gambar'];
    // $gambar = $_FILES['gambar']['name'];
    $temp = $_FILES['gambar']['tmp_name'];

    if (!empty($temp)) {
        $gambar =$_FILES['gambar']['name'];
        move_uploaded_file($temp, '../upload/'.$gambar);
    }

    $sql = "UPDATE tblmenu SET idkategori = $idkategori, menu = '$menu', gambar = '$gambar', harga = '$harga' WHERE idmenu = $id";
    $db->runSql($sql);
    header('location:?f=menu&m=select');

    // if (empty($gambar)) {
    //     echo '<div class="alert alert-danger">Gambar harus diisi</div>';
    // } else {
    //     $sql = "INSERT INTO tblmenu VALUES (NULL, $idkategori, '$menu', '$gambar', '$harga')";
    //     $db->runSql($sql);
    //     header('location:?f=menu&m=select');
    // }
}

?>