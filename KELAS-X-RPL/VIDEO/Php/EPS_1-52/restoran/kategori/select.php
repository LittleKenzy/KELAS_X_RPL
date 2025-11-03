<?php
$jumlah_data = $db->rowCount("SELECT idkategori FROM tblkategori");
$banyak = 4;

$halaman = ceil($jumlah_data / $banyak);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}

$sql = "SELECT * FROM tblkategori ORDER BY kategori ASC LIMIT $mulai,$banyak";
$row = $db->getAll($sql);

$no = 1+$mulai;


?>

<h1>Kategori</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

    </thead>
    <tbody>
        <?php
        foreach ($row as $r):
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $r['kategori']; ?></td>
                <td><?php echo $r['idkategori']; ?></td>
                <td><?php echo $r['idkategori']; ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php

for ($i = 1; $i < $halaman; $i++) {
    echo '<a href="?f=kategori&m=select&p=' . $i . '">' . $i . '</a>';
    echo '&nbsp;&nbsp;&nbsp;';
}


?>