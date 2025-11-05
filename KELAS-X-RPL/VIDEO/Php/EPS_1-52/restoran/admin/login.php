<?php
session_start();
require_once '../dbcontroller.php';
$db = new DB;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Restoran</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto mt-4">
                <div class="mb-4">
                    <form action="" method="post">
                        <div>
                            <h3>Login Restoran</h3>
                        </div>
                        <div class="mb-4">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" placeholder="Masukkan email mu" class="form-control"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" placeholder="Masukkan password mu"
                                class="form-control" required>
                        </div>
                        <div>
                            <input type="submit" name="simpan" id="" value="Login" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['simpan'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbluser WHERE email = '$email' AND '$password'";
    $count = $db->rowCount($sql);
    if ($count == 0) {
        echo "<h3>Email atau password salah</h3>";
    } else {
        $sql = "SELECT * FROM tbluser WHERE email = '$email' AND '$password'";
        $row = $db->getItem($sql);
        $_SESSION['user'] = $row['email'];
        $_SESSION['level'] = $row['level'];
        header("Location: index.php");
    }
}


?>