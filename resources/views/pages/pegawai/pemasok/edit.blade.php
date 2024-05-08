@extends('layouts.pegawai.dashboard') 

@section('title') 
Edit Pemasok
@endsection

@section('content')
<form method="POST" action="{{ route('pemasok.update', $data->id) }}">
  @csrf
  @method('PATCH')
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="id_pemasok">ID Pemasok</label>
      <input type="text" name="id_pemasok" class="form-control" id="id_pemasok" placeholder="ID Pemasok" autocomplete="off" value="{{$data->id_pemasok}}">
    </div>
    <div class="form-group col-md-4"> 
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{$data->nama}}" autocomplete="off">
    </div>
    
    <div class="form-group col-md-2">
      <label for="no_telp">No Telpon</label>
        <input type="text" class="form-control" id="no_telp" name="no_telp" aria-label="No Telpon" placeholder="No Telpon" value="{{$data->no_telp}}" autocomplete="off">
    </div>
    <div class="form-group col-md-4">
      <label for="alamat">Alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{$data->alamat}}" autocomplete="off">
    </div>
  </div> 
  <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection