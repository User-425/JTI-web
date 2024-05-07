@extends('layouts.pegawai.dashboard') 

@section('title') 
Daftar Produk
@endsection

@section('page_css')
<!-- Custom styles for this page -->
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')

<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">
  DataTables is a third party plugin that is used to generate the demo table
  below. For more information about DataTables, please visit the
  <a target="_blank" href="https://datatables.net"
    >official DataTables documentation</a
  >.
</p> -->

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
        <thead>
          <tr>
            <th>No</th>
            <th>ID_Produk</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
          </tr>
        </thead>    
        <tbody>
            @forelse ($data as $produk)
            <tr>
                <td class="text-center"> {{$loop->index + 1}}</td>
                <td> {{ $produk->id_produk }}</td>
                <td> {{ $produk->nama }}</td>
                <td> {{ $produk->harga }}</td>
                <td> {{ $produk->stok }}</td>
                <td style="width:20%">
                  <a href="#" class="btn btn-primary btn-icon-split btn-sm">
                      <span class="icon text-white-50">
                          <i class="fas fa-pen"></i>
                      </span>
                      <span class="text">Edit</span>
                  </a>
                  <button type="button" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{$produk->id}}">
    <span class="icon text-white-50">
        <i class="fas fa-trash"></i>
    </span>
    <span class="text">Hapus</span>
</button>

                </td>
            </tr>
            @empty
            <tr>
                <td>
                    Data Kosong
                </td>
            </tr>
            @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus Data Produk Ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page_script')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('js/daftarproduk.js')}}"></script>
@endsection