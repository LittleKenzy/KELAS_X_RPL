<div class="row">
    <div class="col-4 mx-auto mt-4">
        <div class="mb-4">
            <form action="" method="post">
                <div>
                    <h3>Login Pelanggan</h3>
                </div>
                <div class="mb-4">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" placeholder="Masukkan email mu" class="form-control"
                        required>
                </div>
                <div class="mb-4">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" placeholder="Masukkan password mu" class="form-control"
                        required>
                </div>
                <div>
                    <input type="submit" name="simpan" id="" value="Login" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['simpan'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tblpelanggan WHERE email = '$email' AND password = '$password' AND aktif = 1";
    $count = $db->rowCount($sql);
    if ($count == 0) {
        echo "<center><h3>Email atau password salah</h3></center>";
    } else {
        $sql = "SELECT * FROM tblpelanggan WHERE email = '$email' AND password = '$password' AND aktif = 1";
        $row = $db->getItem($sql);
        $_SESSION['pelanggan'] = $row['email'];
        $_SESSION['idpelanggan'] = $row['idpelanggan'];

        header("Location: index.php");
    }
}


?>