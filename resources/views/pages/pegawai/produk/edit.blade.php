@extends('layouts.pegawai.dashboard') 

@section('title') 
Edit Produk
@endsection

@section('content')
<form method="POST" action="{{ route('produk.update', $data->id) }}">
  @csrf
  @method('PATCH')
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="id_produk">ID Produk</label>
      <input type="text" name="id_produk" class="form-control" id="id_produk" placeholder="ID Produk" autocomplete="off" value="{{$data->id_produk}}">
    </div>
    <div class="form-group col-md-5"> 
      <label for="nama">Nama Produk</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Produk" value="{{$data->nama}}" autocomplete="off">
    </div>
    
    <div class="form-group col-md-3">
      <label for="harga">Harga</label>
      <div class="input-group ">
        <div class="input-group-prepend">
          <span class="input-group-text">Rp</span>
        </div>
        <input type="text" class="form-control" id="harga" name="harga" aria-label="Harga" placeholder="Harga" value="{{$data->harga}}" autocomplete="off">
      </div>
    </div>
    <div class="form-group col-md-2">
      <label for="stok">Stok</label>
      <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" value="{{$data->stok}}" autocomplete="off">
    </div>
  </div> 
  <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection