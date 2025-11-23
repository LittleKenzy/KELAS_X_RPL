<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$jumlah_data = $db->rowCount("SELECT idorderdetail FROM vorderdetail WHERE idorder=$id");
$banyak = 2;

$halaman = ceil($jumlah_data / $banyak);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}

$sql = "SELECT * FROM vorderdetail WHERE idorder=$id ORDER BY idorderdetail ASC LIMIT $mulai, $banyak";
$row = $db->getAll($sql);

$no = 1 + $mulai;


?>
<h1>Detail Pembelian</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
        </tr>

    </thead>
    <tbody>
        <?php
        foreach ($row as $r):
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $r['tglorder']; ?></td>
                <td><?php echo $r['menu']; ?></td>
                <td><?php echo $r['harga']; ?></td>
                <td><?php echo $r['jumlah']; ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php

for ($i = 1; $i <= $halaman; $i++) {
    echo '<a href="?f=home&m=detail&id='. $r['idorder'] .'&p=' . $i . '">' . $i . '</a>';
    echo '&nbsp;&nbsp;&nbsp;';
}


?>