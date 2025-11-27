@extends('front')

@section('content')
    @foreach ($menus as $menu)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('img/'.$menu->gambar) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $menu->menu }}</h5>
                <p class="card-text">{{ $menu->deskripsi }}</p> 
                <h5 class="card-text">{{ $menu->harga }}</h5> 
                <a href="#" class="btn btn-primary">Beli</a>
            </div>
        </div>
    @endforeach
@endsection
