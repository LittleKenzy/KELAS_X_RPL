<?php
session_start();
require_once 'dbcontroller.php';
$db = new DB;

$sql = "SELECT * FROM tblkategori ORDER BY idkategori";
$row = $db->getAll($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran SMK | Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Restoran SMK</h2>
            </div>

            <div class="col-md-9">
                <div class="float-end mt-4"><a>Logout </a></div>
                <div class="float-end mt-4" style="margin-right: 2rem;"><a> Login</a></div>
                <div class="float-end mt-4" style="margin-right: 2rem;">Pelanggan<a></div>
                <div class="float-end mt-4" style="margin-right: 2rem;">Daftar<a></div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-3">
                <h3>Kategori</h3>
                <hr>
                <ul class="nav flex-column">
                    <?php if (!empty($row)) { ?>
                        <?php foreach ($row as $r): ?>
                            <li class="nav-item"><a href="#" class="nav-link"><?php echo $r['kategori']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>

                <?php } ?>
            </div>
            <div class="col-md-9">
                <?php
                echo '<h1>DAFTAR MENU</h1>'
                    ?>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <p class="text-center">Copyright &copy; 2025</p>
        </div>
    </div>
</body>

</html>