<div style="margin: auto; width: 200px; padding: 10px;">

    <h3><a href="http://kelas_x_rpl.test/KELAS-X-RPL/VIDEO/Php/EPS_1-52/restoran/kategori/insert.php">TAMBAH DATA</a></h3>
    <?php

    require_once '../function.php';

    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        require_once 'delete.php';
    }
    echo '<br>';

    $sql = "SELECT idkategori FROM tblkategori";
    $result = mysqli_query($koneksi, $sql);
    $jumlah_data = mysqli_num_rows($result);

    $banyak = 3;

    $halaman = ceil($jumlah_data / $banyak);

    for ($i = 1; $i < $halaman; $i++) {
        echo '<a href="?p=' . $i . '">' . $i . '</a>';

        echo '&nbsp;&nbsp;&nbsp;';
    }

    echo '<br><br>';

    if (isset($_GET['p'])) {
        $p = $_GET['p'];
        // echo "Halaman: " . $p . "<br>";
        $mulai = ($p * $banyak) - $banyak;
    } else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM tblkategori LIMIT $mulai, $banyak";

    $result = mysqli_query($koneksi, $sql);

    // var_dump($result);
    $jumlah = mysqli_num_rows($result);

    // echo "<br>";
// echo "<pre>";
    
    // echo "Jumlah data: " . $jumlah . "<br>";
    
    echo '<table border="1">
    <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Hapus</th>
    </tr>';

    $no = $mulai + 1;

    if ($jumlah > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $no++ . '</td>';
            echo '<td>' . $row['kategori'] . '</td>';
            echo '<td><a href="?hapus='.$row['idkategori'].'">' . 'Hapus' . '</a></td>';
            echo '</tr>';
        }
    }

    echo '</table>';

    ?>

</div>