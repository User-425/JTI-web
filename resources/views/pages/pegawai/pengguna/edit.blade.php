@extends('layouts.pegawai.dashboard') 

@section('title') 
Edit Pengguna
@endsection

@section('content')
<form method="POST" action="{{ route('pengguna.update', $data->id) }}">
  @csrf
  @method('PATCH')
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Name" autocomplete="off" value="{{$data->name}}">
    </div>
    <div class="form-group col-md-5"> 
      <label for="emai">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$data->email}}" autocomplete="off">
    </div>
    
    <div class="form-group col-md-3">
      <label for="role">Role</label>
      <select class="form-select form-control" aria-label="Default select example" name="role">
        <option value="Pegawai">Pegawai</option>
        <option value="Pembeli">Pembeli</option>
      </select>
      <!-- <input type="text" class="form-control" id="role" name="role" aria-label="role" placeholder="Role" value="{{$data->role}}" autocomplete="off"> -->
    </div>
    
  </div> 
  <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection