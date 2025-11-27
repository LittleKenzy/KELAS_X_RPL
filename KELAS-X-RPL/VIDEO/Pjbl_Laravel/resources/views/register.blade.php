@extends('front')

@section('content')
    <div class="row">
        <div class="col-6">
            <form action="" method="post">
                <div class="mt-2">
                    <label for="" class="form-label">Pelanggan</label>
                    <input class="form-control" type="text" name="pelanggan" id="">
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Alamat</label>
                    <input class="form-control" type="text" name="alamat" id="">
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Telp</label>
                    <input class="form-control" type="text" name="telp" id="">
                </div>
                <div class="mt-2">
                    <label class="form-label" for="">Jenis Kelamin</label>
                    <select name="jeniskelamin" class="form-select" id="">
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" id="">
                </div>
                <div class="mt-2">
                    <label class="form-label" for="">Password</label>
                    <input class="form-control" type="password" name="password" id="">
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
