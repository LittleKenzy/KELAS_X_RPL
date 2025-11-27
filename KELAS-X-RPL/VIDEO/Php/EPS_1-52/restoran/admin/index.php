<?php
session_start();
require_once '../dbcontroller.php';
$db = new DB;

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

if (isset($_GET['log'])) {
    session_destroy();
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page | Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3">
                <a href="index.php">
                    <h2>Admin Page</h2>
                </a>
            </div>

            <div class="col-md-9">
                <div class="float-end mt-4"><a href="?log=logout">Logout</a></div>
                <div class="float-end mt-4" style="margin-right: 2rem;">User : <a
                        href="?f=user&m=updateuser&id=<?php echo $_SESSION['iduser']; ?>"><?php echo $_SESSION['user']; ?></a>
                </div>
                <div class="float-end mt-4">Level : <?php echo $_SESSION['level']; ?></div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-3">
                <ul class="nav flex-column">

                    <?php
                    $level = $_SESSION['level'];
                    switch ($level) {
                        case 'admin':
                            echo '
                          <li class="nav-item"><a href="?f=kategori&m=select" class="nav-link">Kategori</a></li>
                    <li class="nav-item"><a href="?f=menu&m=select" class="nav-link">Menu</a></li>
                    <li class="nav-item"><a href="?f=pelanggan&m=select" class="nav-link">Pelanggan</a></li>
                    <li class="nav-item"><a href="?f=order&m=select" class="nav-link">Order</a></li>
                    <li class="nav-item"><a href="?f=orderdetail&m=select" class="nav-link">Order Detail</a></li>
                    <li class="nav-item"><a href="?f=user&m=select" class="nav-link">User</a></li>
                </ul>
                        ';
                            break;

                        case 'kasir':
                            echo '
                                <li class="nav-item"><a href="?f=order&m=select" class="nav-link">Order</a></li>
                                <li class="nav-item"><a href="?f=orderdetail&m=select" class="nav-link">Order Detail</a></li>
                        ';
                            break;
                        case 'koki':
                            echo '
                                <li class="nav-item"><a href="?f=orderdetail&m=select" class="nav-link">Order Detail</a></li>
                        ';
                            break;

                        default:
                            echo 'tidak ada menu';
                            break;
                    }
                    ?>


            </div>
            <div class="col-md-9">
                <?php

                if (isset($_GET['f']) && isset($_GET['m'])) {
                    $f = $_GET['f'];
                    $m = $_GET['m'];

                    $file = '../' . $f . '/' . $m . '.php';

                    require_once $file;
                }
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