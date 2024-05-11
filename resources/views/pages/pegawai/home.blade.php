@extends('layouts.pegawai.dashboard')

@section('title')
Dashboard
@endsection

@section('content')


<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pendapatan (Perminggu)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{$totalSellingThisWeek}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Pendapatan (Perbulan)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{$totalSellingThisMonth}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pengeluaran (Perbulan)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">-</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Best Seller</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$bestSellerThisMonth}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Referral
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-5 col-lg-7">
        <div class="card shadow mb-7">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pembelian Terkini</h6>
            </div>
            <div class="card-body overflow-auto">
                @foreach($recentTransactions as $transaction)
                <a href="{{ route('transaksi.show', $transaction->id)}}" style="text-decoration:none; color:inherit;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="buyer-details mb-2">
                            <strong>Pembeli: {{ $transaction->pembeliName }}</strong> 
                        </div>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <div class="transaction-details">
                            <span class="price">Total:
                                @php
                                $totalPrice = 0;
                                foreach ($transaction->items as $item) {
                                $totalPrice += $item->jumlah * $item->product->harga;
                                }
                                echo number_format($totalPrice);
                                @endphp
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-xl-5">
                        <i class="fas fa-solid fa-user-tie"></i>
                        {{ $transaction->pegawaiName }}
                    </div>
                    <div class="col-md-7 col-lg-7 col-xl-7 text-md-right">
                        <i class="fas fa-solid fa-clock"></i>
                        {{ $transaction->waktu }}
                    </div>
                </div>
                <hr class="my-4">
                </a>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection

@section('page_script')
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
@endsection