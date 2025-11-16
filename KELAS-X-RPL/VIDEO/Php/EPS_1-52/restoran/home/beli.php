<h1>Keranjang Belanja</h1>
<?php

if (!isset($_SESSION['pelanggan'])) {
    header("Location: ?f=home&m=login");
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        isi($id);
        header("Location: ?f=home&m=beli");
    } else {
        keranjang();
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    unset($_SESSION['_' . $id]);
    header("Location: ?f=home&m=beli");
}


function isi($id)
{
    if (isset($_SESSION['_' . $id])) {
        $_SESSION['_' . $id]++;
    } else {
        $_SESSION['_' . $id] = 1;
    }
}

function keranjang()
{
    global $db;
    echo '
    <table class="table table-bordered w-50">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Hapus</th>
        </tr>
    ';

    foreach ($_SESSION as $key => $value) {
        if ($key <> 'pelanggan' && $key <> 'idpelanggan') {
            $id = substr($key, 1);

            $sql = "SELECT * FROM tblmenu WHERE idmenu = $id";
            $row = $db->getAll($sql);
            foreach ($row as $r) {
                echo ' <tr>';
                echo '<td>' . $r['menu'] . '</td>';
                echo '<td>' . 'Rp.', $r['harga'] . '</td>';
                echo '<td>' . $value . '</td>';
                echo '<td>' . 'Rp.', $r['harga'] * $value . '</td>';
                echo '<td>' . '<a href="?f=home&m=beli&hapus=' . $r['idmenu'] . '" class="btn btn-danger">Hapus</a>' . '</td>';
                echo '<tr/>';
            }
        }
    }
    echo '</table>';
}

?>