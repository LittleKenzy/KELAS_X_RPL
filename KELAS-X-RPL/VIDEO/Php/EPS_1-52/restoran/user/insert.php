<h1>Insert User</h1>

<div class="mb-5">
    <form action="" method="post">
        <div class="mb-3 w-50">
            <label for="">Nama User</label>
            <input type="text" name="user" id="" placeholder="Isi User" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="">Email User</label>
            <input type="email" name="email" id="" placeholder="Isi Email" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="">Password</label>
            <input type="password" name="password" id="" placeholder="Isi Password" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="konfirmasi" id="" placeholder="Isi Password Kembali" required
                class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="">Level</label>
            <br>
            <select name="level" id="">
                <option value="admin">admin</option>
                <option value="admin">koki</option>
                <option value="admin">kasir</option>
            </select>
        </div>

        <div>
            <input type="submit" name="simpan" id="" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php

if (isset($_POST['simpan'])) {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    $konfirmasi = hash('sha256', $_POST['konfirmasi']);
    $level = $_POST['level'];

    if ($password === $konfirmasi) {
        $sql = "INSERT INTO tbluser VALUES (NULL, '$user', '$email', '$password', '$level', 1)";
        $db->runSql($sql);
        header('location:?f=user&m=select');
    } else {
        echo "<h3>Password Tidak Sama</h3>";
    }
}

?>