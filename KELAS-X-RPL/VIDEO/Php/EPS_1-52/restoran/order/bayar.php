<?php

$id = $_GET['id'];
$sql = "SELECT * FROM tblorder WHERE idorder = $id";
$row = $db->getItem($sql);

if (!$row) {
    die("Data order tidak ditemukan.");
}

?>

<h1>Pembayaran Order</h1>

<div class="mb-5">
    <form action="" method="POST">

        <div class="mb-3 w-50">
            <label>Total</label>
            <input type="text" name="total" class="form-control" value="<?php echo $row['total']; ?>" readonly>
        </div>

        <div class="mb-3 w-50">
            <label>Bayar</label>
            <input type="text" name="bayar" class="form-control" required>
        </div>

        <div>
            <input type="submit" name="simpan" value="Bayar" class="btn btn-primary">
        </div>
    </form>
</div>

<?php

if (isset($_POST['simpan'])) {

    $bayar = $_POST['bayar'];
    $total = $row['total'];
    $kembali = $bayar - $total;
    $sql = "UPDATE tblorder SET bayar = $bayar, kembali = $kembali, status = 1 WHERE idorder = $id";
    if ($kembali < 0) {
        echo "<h3>Pembayaran kurang</h3>";
    } else {
        $db->runSql($sql);

        header('location:?f=order&m=select');
    }
}

?>