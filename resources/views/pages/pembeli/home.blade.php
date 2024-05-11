@extends('layouts.pembeli.dashboard')

@section('title')
Dashboard
@endsection

@section('page_css')
<!-- Custom styles for this page -->
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
    <a href="{{route('produk.create')}}" class="btn btn-primary btn-icon-split btn-sm">
    </a>
</div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Produk</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
          </tr>
        </thead>    
        <tbody>
            @forelse ($data as $produk)
            <tr>
                <td class="text-center"> {{$loop->index + 1}}</td>
                <td> {{ $produk->id_produk }}</td>
                <td> {{ $produk->nama }}</td>
                <td> Rp{{ number_format($produk->harga) }}</td>
                <td> {{ $produk->stok }}</td>
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
@endsection

@section('page_script')
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script> 
    @endsection