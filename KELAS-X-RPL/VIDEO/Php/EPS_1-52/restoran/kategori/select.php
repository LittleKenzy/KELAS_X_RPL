<div style="margin: auto; width: 200px; padding: 10px;">
    <?php

    require_once '../function.php';

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
        $p=$_GET['p'];
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
    </tr>';

    $no = $mulai + 1;

    if ($jumlah > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $no++ . '</td>';
            echo '<td>' . $row['kategori'] . '</td>';
            echo '</tr>';
        }
    }

    echo '</table>';

    ?>

</div>