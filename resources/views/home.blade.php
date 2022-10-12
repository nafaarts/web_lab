@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                            {{ __('Selamat Datang, ') . auth()->user()->name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-gradient-primary text-white p-3">
                    <small>Jenis barang</small>
                    <h3 class="m-0">{{ $jenis_barang }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-gradient-primary text-white p-3">
                    <small>Jumlah Lab</small>
                    <h3 class="m-0">{{ $jumlah_lab }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-gradient-primary text-white p-3">
                    <small>Jumlah Pelapor</small>
                    <h3 class="m-0">{{ $jumlah_pelapor }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-gradient-primary text-white p-3">
                    <small>Total Barang</small>
                    <h3 class="m-0">{{ $total_barang }}</h3>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-gradient-success p-3">
                    <small>Barang Baik</small>
                    <h3 class="m-0">{{ $total_barang_baik }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-gradient-warning p-3">
                    <small>Barang Rusak</small>
                    <h3 class="m-0">{{ $total_barang_rusak }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-gradient-danger p-3">
                    <small>Barang Hilang</small>
                    <h3 class="m-0">{{ $total_barang_hilang }}</h3>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
@endsection
