<?php

$row = $db->getAll("SELECT * FROM tblkategori ORDER BY idkategori ASC");

?>

<h1>Insert Menu</h1>

<div class="mb-5">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 w-50">
            <label for="">Kategori</label>
            <select name="idkategori" id="" onchange="this.form.submit()">
                <?php foreach ($row as $r): ?>
                    <option value="<?php echo $r['idkategori']; ?>">
                        <?php echo $r['kategori']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3 w-50">
            <label for="">Nama Menu</label>
            <input type="text" name="menu" id="" placeholder="Isi Menu" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="">Harga</label>
            <input type="number" name="harga" id="" placeholder="Isi Menu" required class="form-control">
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
    $gambar = $_FILES['gambar']['name'];
    $temp = $_FILES['gambar']['tmp_name'];

    if (empty($gambar)) {
        echo '<div class="alert alert-danger">Gambar harus diisi</div>';
    } else {
        $sql = "INSERT INTO tblmenu VALUES (NULL, $idkategori, '$menu', '$gambar', '$harga')";
        move_uploaded_file($temp, '../upload/'.$gambar);
        $db->runSql($sql);
        header('location:?f=menu&m=select');
    }
}

?>