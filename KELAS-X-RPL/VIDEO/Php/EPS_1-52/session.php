<?php 
session_start();
?>

<nav>
    <ul>
        <li><a href="?menu=isi">Isi</a></li>
        <li><a href="?menu=lihat">Lihat</a></li>
        <li><a href="?menu=hapus">Hapus</a></li>
        <li><a href="?menu=destroy">Destroy</a></li>
    </ul>
</nav>

<?php 

if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];

    switch ($menu) {
        case 'isi':
            $_SESSION['user'] = 'joni';
            $_SESSION['nama'] = 'joni supriadi';
            $_SESSION['alamat'] = 'surabaya';
            echo "Session sudah diisi.<br>";
            break;

        case 'lihat':
            isisession();
            break;

        case 'hapus':
            unset($_SESSION['user']);
            echo "Session 'user' dihapus.<br>";
            break;

        case 'destroy':
            session_destroy();
            echo "Semua session dihapus (destroy).<br>";
            break;
    }
}

echo "<hr>";
echo "<b>Isi session sekarang:</b><br>";
var_dump($_SESSION);

function isisession() {
    if (isset($_SESSION['user'])) {
        echo "User: " . $_SESSION['user'] . "<br>";
        echo "Nama: " . $_SESSION['nama'] . "<br>";
        echo "Alamat: " . $_SESSION['alamat'] . "<br>";
    } else {
        echo "Belum ada session yang diisi.<br>";
    }
}
?>
