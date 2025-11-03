<?php 

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tblkategori WHERE idkategori = $id";
    $row = $db->getItem($sql);
}

?>

<h1>Update Kategori</h1>

<div class="mb-5">
    <form action="" method="post">
        <div class="mb-3 w-50">
            <label for="">Kategori</label>
            <input type="text" name="kategori" id="" value="<?php echo $row['kategori']; ?>" required class="form-control">
        </div>

        <div>
            <input type="submit" name="simpan" id="" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php

if (isset($_POST['simpan'])) {
    $kategori = $_POST['kategori'];
    $sql = "UPDATE tblkategori SET kategori = '$kategori' WHERE idkategori = $id VALUES (NULL, '$kategori')";
    // echo $sql;

    $db->runSql($sql);
    header('location:?f=kategori&m=select');
}

?>