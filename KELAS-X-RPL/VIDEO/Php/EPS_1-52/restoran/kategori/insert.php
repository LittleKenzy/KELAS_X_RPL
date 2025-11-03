<h1>Insert Kategori</h1>

<div class="mb-5">
    <form action="" method="post">
        <div class="mb-3 w-50">
            <label for="">Kategori</label>
            <input type="text" name="kategori" id="" placeholder="Isi kategori" required class="form-control">
        </div>

        <div>
            <input type="submit" name="simpan" id="" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php 

if(isset($_POST['simpan'])) {
    $kategori = $_POST['kategori'];
    $sql = "INSERT INTO tblkategori VALUES (NULL, '$kategori')"; 

    $db->runSql($sql);
    header('location:?f=kategori&m=select');
}

?>