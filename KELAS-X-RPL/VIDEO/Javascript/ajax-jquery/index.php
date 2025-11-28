<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax - Jquery Bootstrap PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="./js/app.js"></script>
    <script src="./js/jquery.js"></script>
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <h1>Belajar Ajax Jquery Bootstrap PHP</h1>
        </div>
        <div class="row mt-4">
            <div class="col-4">
                <button id="btn-tambah" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".modal">Tambah Data</button>
            </div>
            <div id="msg">

            </div>
            <!-- <div class="col-sm">

            </div> -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Hapus</th>
                        <th scope="col">Ubah</th>
                    </tr>
                </thead>
                <tbody id="isi">

                </tbody>
            </table>
        </div>
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="id" aria-describedby="emailHelp">
                                <label for="exampleInputEmail1" class="form-label">Pelanggan</label>
                                <input type="text" class="form-control" id="pelanggan" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Harus diisi</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat">
                                <div id="emailHelp" class="form-text">Harus diisi</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Telp</label>
                                <input type="text" class="form-control" id="telp">
                                <div id="emailHelp" class="form-text">Harus diisi</div>
                            </div>
                            <button type="submit" id="submit" data-bs-dismiss="modal" class="btn btn-primary">Simpan</button>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            alert('coba')
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>