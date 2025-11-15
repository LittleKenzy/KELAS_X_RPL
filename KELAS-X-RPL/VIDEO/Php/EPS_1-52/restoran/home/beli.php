<h1>Keranjang Belanja</h1>
<?php

if (!isset($_SESSION['pelanggan'])) {
    header("Location: ?f=home&m=login");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_SESSION['_' . $id])) {
        $_SESSION['_' . $id]++;
    } else {
        $_SESSION['_' . $id] = 1;
    }
    echo '
    <table class="table table-bordered w-50">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Total</th>
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
                echo '<td>' .  $value . '</td>';
                echo '<td>' . 'Rp.', $r['harga'] * $value . '</td>';
                echo '<tr/>';
            }
        }
    }
    echo '</table>';
}

?>