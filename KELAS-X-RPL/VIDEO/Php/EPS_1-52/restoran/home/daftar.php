<?php ob_start(); ?> 

<h1>Registrasi Pelanggan</h1>

<div class="mb-5">
    <form action="" method="post">
        <div class="mb-3 w-50">
            <label>Pelanggan</label>
            <input type="text" name="pelanggan" placeholder="Isi Pelanggan" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Isi Alamat" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label>Telp</label>
            <input type="text" name="telp" placeholder="Isi Telp" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label>Email Pelanggan</label>
            <input type="email" name="email" placeholder="Isi Email" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label>Password</label>
            <input type="password" name="password" placeholder="Isi Password" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label>Konfirmasi Password</label>
            <input type="password" name="konfirmasi" placeholder="Isi Password Kembali" required class="form-control">
        </div>

        <div>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $pelanggan   = $_POST['pelanggan'];
    $alamat      = $_POST['alamat'];
    $telp        = $_POST['telp'];
    $email       = $_POST['email'];
    $password    = $_POST['password'];
    $konfirmasi  = $_POST['konfirmasi'];

    if ($password === $konfirmasi) {
        $sql = "INSERT INTO tblpelanggan VALUES (NULL, '$pelanggan', '$alamat', '$telp', '$email', '$password', 1)";
        $db->runSql($sql);
        header('Location: ?f=home&m=info');
        exit;
    } else {
        echo "<h3 style='color:red;'>Password Tidak Sama</h3>";
    }
}
?>

<?php ob_end_flush(); ?>
