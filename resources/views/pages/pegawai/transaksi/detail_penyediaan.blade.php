@extends('layouts.pegawai.dashboard') 

@section('title') 
Detail Pembelian
@endsection

@section('page_css')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<div class="row">
  <div class="form-group col-md-3">
    <label for="id_pembeli">Pegawai</label>
    <input type="text" class="form-control" id="id_pembeli" name="id_pembeli" placeholder="0000" autocomplete="off" value="{{ $penyediaan->pegawaiName }}" disabled>
  </div>
  <div class="form-group col-md-3">
    <label for="id_pembeli">Pemasok:</label>
    <input type="text" class="form-control" id="id_pembeli" name="id_pembeli" placeholder="0000" autocomplete="off" value="{{ $penyediaan->pemasokName }} " disabled>
  </div>
  <!-- <div class="form-group col-md-6">
    <label for="jenis">Jenis</label>
    <select id="jenis" class="form-select form-control" aria-label="Default select example">
      <option value="Tunai" selected>Tunai</option>
      <option value="Non-tunai">Non-tunai</option>
    </select>
  </div> -->
</div>

<br>


<div class="card shadow mb-4">
<div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Produk yang Dibeli</h6>
</div>

<div class="card-body">
  <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Produk</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Harga</th>
          </tr>
        </thead>    
        <tbody>
            <!-- {{$total = 0}} -->
            @forelse ($items as $produk)
            <tr>
                <td class="text-center"> {{$loop->index + 1}}</td>
                <td> {{ $produk->id_produk }}</td>
                <td> {{ $produk->nama }}</td>
                <td> {{ $produk->jumlah }}</td>
                <td> Rp{{ number_format($produk->harga) }}</td>
            </tr>
            <!-- {{$total += $produk->harga * $produk->jumlah}} -->
            @empty
            <tr>
                <td>
                    Data Kosong
                </td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
          <tr>
            <th colspan="4" style="text-align:end; border-right: none !important;">Total Harga: </th>
            <th id="totalPrice" style="text-align:end">Rp{{number_format($totals)}}</th> <!-- Will be dynamically generated-->
          </tr>
        </tfoot> 
      </table>
    </div>
  </div>
</div>
<br>

@endsection

@section('page_script')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->
    <script src="{{asset('js/kasirpembelian.js')}}"></script>
@endsection