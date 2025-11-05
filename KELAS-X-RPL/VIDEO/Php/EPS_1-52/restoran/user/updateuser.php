<?php 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbluser WHERE iduser = '$id'";
    $row = $db->getItem($sql);
}

?>

<h1>Update User</h1>

<div class="mb-5">
    <form action="" method="post">
        <div class="mb-3 w-50">
            <label for="">Nama User</label>
            <input type="text" name="user" id="" value="<?php echo $row['user']; ?>" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="">Email User</label>
            <input type="email" name="email" id="" value="<?php echo $row['email']; ?>" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="">Password</label>
            <input type="password" name="password" id="" value="<?php echo $row['password']; ?>" required class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="konfirmasi" id="" value="<?php echo $row['password']; ?>" required
                class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="">Level</label>
            <br>
            <select name="level" id="">
                <option value="admin" <?php if ($row['level'] == 'admin') echo "selected"; ?>>admin</option>
                <option value="admin" <?php if ($row['level'] == 'koki') echo "selected"; ?>>koki</option>
                <option value="admin" <?php if ($row['level'] == 'kasir') echo "selected"; ?>>kasir</option>
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
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];
    $level = $_POST['level'];

    if ($password === $konfirmasi) {
        $sql = "UPDATE tbluser SET user = '$user', email = '$email', password = '$password', level = '$level' WHERE iduser = '$id'";
        $db->runSql($sql);
        header('location:?f=user&m=select');
    } else {
        echo "<h3>Password Tidak Sama</h3>";
    }
}

?>