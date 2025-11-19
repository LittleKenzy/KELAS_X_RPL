<?php


if (isset($_GET['total'])) {
    $total = $_GET['total'];
    echo "Total Belanja Anda: Rp " . $total;

    echo '<br>';
    echo idorder(); 
    insertOrder(idorder(), $_SESSION['idpelanggan'], '2025-06-01', $total);
}

function idorder()
{
    global $db;
    $sql = "SELECT idorder FROM tblorder ORDER BY idorder DESC";
    $jumlah = $db->rowCount($sql);
    if ($jumlah == 0) {
        $id = 1;
        return $id;
    } else {
        $item = $db->getItem($sql);
        $id = $item['idorder'] + 1;
    }
}

function insertOrder($idorder, $idpelanggan, $tgl, $total)
{
    global $db;

    $sql = "INSERT INTO tblorder VALUES ($idorder, $idpelanggan, '$tgl', $total,0,0,0)";
    echo $sql;
}
?>