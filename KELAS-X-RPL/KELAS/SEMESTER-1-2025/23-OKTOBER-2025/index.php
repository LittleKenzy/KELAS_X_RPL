<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilal alaudin</title>
</head>

<body>
    <div>
        <div>
            <ul>
                <li><a href="?menu=home">Home</a></li>
                <?php
                if (!isset($_SESSION['email'])) {
                    ?>
                    <li><a href="?menu=register">Register</a></li>
                    <li><a href="?menu=login">Login</a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="?menu=logout">Logout</a></li>
                    <li><a href="?menu=user">User</a></li>
                    <?php
                }
                ?>


            </ul>
        </div>
        <div>
            <?php
            if (isset($_GET['menu'])) {
                $isi = $_GET['menu'];

                if ($isi == 'home') {
                    require_once 'home.php';
                } elseif ($isi == 'register') {
                    require_once 'register.php';
                } elseif ($isi == 'login') {
                    require_once 'login.php';
                } elseif ($isi == 'logout') {
                    require_once 'logout.php';
                } elseif ($isi == 'user') {
                    require_once 'user.php';
                } else {
                    echo "Page not found.";
                }
            } else {
                require_once 'home.php';
            }
            ?>
        </div>
    </div>
</body>

</html>