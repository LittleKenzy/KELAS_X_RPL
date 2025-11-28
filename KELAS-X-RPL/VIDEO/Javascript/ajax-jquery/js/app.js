$(document).ready(function () {
    let id = ''
    let pelanggan = ''
    let alamat = ''
    let telp = ''

    $('#submit').submit(function (e) {
        e.preventDefault();
        id = $('#id').val();
        pelanggan = $('#pelanggan').val();
        alamat = $('#alamat').val();
        telp = $('#telp').val();

        if (id != '') {
            insertData()
        } else {
            updateData()
        }


        $('#id').val('');
        $('#pelanggan').val('');
        $('#alamat').val('');
        $('#telp').val('');
    });
    $('#btn-tambah').submit(function (e) {
        e.preventDefault();
        $('#title').html('<p>Tambah Data</p>');

        $('#id').val('');
        $('#pelanggan').val('');
        $('#alamat').val('');
        $('#telp').val('');
    });

    $('tbody').on('click', 'btn-del', function () {
        let id = $(this).attr('data-id');
        
        if (confirm('Yakin Akan Menghapus ?')) {
            deleteData(id);
        }
    });
    $('tbody').on('click', 'btn-ubah', function () {
        let id = $(this).attr('data-id');
        $('#title').html('<p>Ubah Data</p>');
        selectUpdate(id)
    });

    function selectUpdate(id) {
        let idPelanggan = {
            idpelanggan: id
        }
        $.ajax({
            type: "post",
            url: "php/selectupdate.php",
            cache: false,
            data: JSON.stringify(idpelanggan),
            // dataType: "dataType",
            success: function (response) {
                let data = JSON.parse(response)
                console.log(data.idpelanggan)
                console.log(data.pelanggan)
                console.log(data.alamat)
                console.log(data.telp)

                $('#id').val(data.idpelanggan);
                $('#pelanggan').val(data.pelanggan);
                $('#alamat').val(data.alamat);
                $('#telp').val(data.telp);
            }
        });

        selectData()
    }



    function selectData() {
        $.ajax({
            type: "get",
            url: "php/select.php",
            cache: false,
            dataType: "json",
            success: function (response) {
                let out = ''
                let No = 1
                $.each(response, function (key, val) {
                    out += `
                    <tr>
                       <td>${No++}</td>
                        <td>${val.pelanggan}</td>
                        <td>${val.alamat}</td>
                        <td>${val.telp}</td>
                        <td><button type="button" class="btn btn-danger btn-del" data-id="${val.id_pelanggan}">Delete</button></td>
                        <td><button type="button" class="btn btn-warning btn-ubah" data-id="${val.id_pelanggan}">Ubah</button></td>
                    </tr>
                    `
                });
                $('#isi').html(out)
            }
        });
    }

    function insertData() {
        let dataPelanggan = {
            pelanggan: pelanggan,
            al: alamat,
            telp: telp
        }
        $.ajax({
            type: "post",
            url: "php/insert.php",
            cache: false,
            data: JSON.stringify(dataPelanggan),
            // dataType: "dataType",
            success: function (response) {
                let out = `<p>'{response}'</p>`
                $('#msg').html(out);
            }
        });

        selectData()
    }

    function updateData() {

    }

    function deleteData() {
        let idPelanggan = {
            idpelanggan: id
        }
        $.ajax({
            type: "post",
            url: "php/delete.php",
            cache: false,
            data: JSON.stringify(idpelanggan),
            // dataType: "dataType",
            success: function (response) {
                let out = `<p>'{response}'</p>`
                $('#msg').html(out);
            }
        });
    }


});