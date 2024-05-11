@extends('layouts.pegawai.dashboard') 

@section('title') 
Kasir Pembelian
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
  <div class="form-group col-md-4">
    <label for="id_pembeli">ID Pembeli</label>
    <input type="text" class="form-control" id="id_pembeli" name="id_pembeli" placeholder="0000" autocomplete="off">
  </div>
  <div class="form-group col-md-6">
    <label for="jenis">Jenis</label>
    <select id="jenis" class="form-select form-control" aria-label="Default select example">
      <option value="Tunai" selected>Tunai</option>
      <option value="Non-Tunai">Non-Tunai</option>
    </select>
  </div>
</div>

<br>


<div class="card shadow mb-4">
<div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">Kasir</h6>
    <button href="#" data-toggle="modal" data-target="#produkModal"  class="btn btn-primary btn-icon-split btn-sm">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Produk</span>
</button>
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
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
          </tr>
        </thead>    
        <tfoot>
          <tr>
            <th colspan="6" style="text-align:end; border-right: none !important;">Total Harga: </th>
            <th id="totalPrice" style="text-align:end">Rp0</th> <!-- Will be dynamically generated-->
          </tr>
        </tfoot> 
        <tbody>

          <!-- This will be dynamically loaded -->
            <!-- @forelse ($data as $produk)
            <tr>
                <td class="text-center"> {{$loop->index + 1}}</td>
                <td> {{ $produk->id_produk }}</td>
                <td> {{ $produk->nama }}</td>
                <td> {{ $produk->harga }}</td>
                <td> 
                    <input type="text" class="jumlah" data-harga="{{ $produk->harga }}">
                </td>
                <td class="total">0</td>
                <td style="width:20%">
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
            @endforelse -->
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="row justify-content-end">
  <div class="col-auto">
    <button type="button" class="btn btn-primary" id="storeTransaction">Submit</button>
  </div>
</div>
<br>

<!-- Product List Modal -->
<div class="modal fade " id="produkModal" tabindex="-1" role="dialog" aria-labelledby="produkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="produkModalLabel">Daftar Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="table-responsive">
      <table class="table table-bordered" id="produkTable" width="100%" cellspacing="0" style="text-align:center;">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Produk</th>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>    
        <tbody>
            @forelse ($data as $produk)
            <tr>
                <td class="text-center"> {{$loop->index + 1}}</td>
                <td> {{ $produk->id_produk }}</td>
                <td> {{ $produk->nama }}</td>
                <td style="width:20%">
                  <button type="button" class="btn btn-primary btn-icon-split btn-sm btn-add-item"  data-id="{{$produk->id}}">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
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
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

@endsection

@section('page_script')
  <script>
    const dataList = {!! json_encode($data) !!};
    const id_pegawai = {{$pegawaiId}};
  </script>
  
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('js/kasirpembelian.js')}}"></script>
@endsection