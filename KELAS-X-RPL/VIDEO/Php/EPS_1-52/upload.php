<form action="" method="post" enctype="multipart/form-data">

<label for="">Pilih file gambar:</label>
<input type="file" name="upload" id="">
<input type="submit" name="kirim" id="" value="Simpan">

</form>

<?php 
if (isset($_POST['kirim'])) {

    // $file = $_FILES['upload'];
    // var_dump($_FILES['upload']);

    // foreach ($file as $key => $value) {
    //     echo $key . ' = ' . $value . '<br>';    
    // }

    $name = $_FILES['upload']['name'];
    $temp = $_FILES['upload']['tmp_name'];
    move_uploaded_file($temp, 'gambar/' . $name);
}

?>
