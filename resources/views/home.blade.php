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
                <div class="card text-white bg-gradient-warning p-3" data-bs-toggle="modal" data-bs-target="#rusakModal"
                    style="cursor: pointer">
                    <small>Barang Rusak</small>
                    <h3 class="m-0">{{ count($total_barang_rusak) }}</h3>
                </div>
            </div>
            <div class="col-md-4" data-bs-toggle="modal" data-bs-target="#hilangModal" style="cursor: pointer">
                <div class="card text-white bg-gradient-danger p-3">
                    <small>Barang Hilang</small>
                    <h3 class="m-0">{{ count($total_barang_hilang) }}</h3>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

    <div class="modal fade" id="rusakModal" tabindex="-1" aria-labelledby="rusakModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rusakModalLabel">Data Rusak</h5>
                    <button type="button" class="btn p-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-fw fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Laboratorium</th>
                                <th scope="col">Jenis Barang</th>
                                <th scope="col">Nomor Barang</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($total_barang_rusak as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->laboratorium->nomor }}</td>
                                    <td>{{ $item->jenis_barang->nama_barang }}</td>
                                    <td>{{ $item->nomor_barang }}</td>
                                    <td>{{ $item->kondisi }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary">
                                            <i class="fas fa-fw fa-eye"></i> Lihat
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hilangModal" tabindex="-1" aria-labelledby="hilangModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hilangModalLabel">Data Rusak</h5>
                    <button type="button" class="btn p-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-fw fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Laboratorium</th>
                                <th scope="col">Jenis Barang</th>
                                <th scope="col">Nomor Barang</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($total_barang_hilang as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->laboratorium->nomor }}</td>
                                    <td>{{ $item->jenis_barang->nama_barang }}</td>
                                    <td>{{ $item->nomor_barang }}</td>
                                    <td>{{ $item->kondisi }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary">
                                            <i class="fas fa-fw fa-eye"></i> Lihat
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
