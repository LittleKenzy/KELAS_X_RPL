<form action="" method="get">
    <label for="">Name</label>
    <br>
    <input type="text" name="name">
    <br>
    <label for="">Email</label>
    <br>
    <input type="text" name="email">
    <br>
    <br>
    <input type="submit" value="Simpan" name="kirim">
</form>

<?php

if (isset($_GET['kirim'])) {
    $nama = $_GET['name'];
    $email = $_GET['email'];

    echo "Nama: " . $nama;
    echo "<br>";
    echo "Email: " . $email;
}


?>