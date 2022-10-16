@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Laporan</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissable mb-4">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $message }}
            </div>
        @endif

        <div class="card p-3 mb-4">
            <h6>Detail Pelapor</h6>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <table class="w-100">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <th>{{ $laporan->pelapor->nama }}</th>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <th>{{ $laporan->pelapor->nim }}</th>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <th>{{ $laporan->pelapor->email }}</th>
                        </tr>
                        <tr>
                            <td>Tahun Ajaran</td>
                            <td>:</td>
                            <th>{{ $laporan->getTahunAjaranSemester()?->tahun_ajaran }}</th>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>:</td>
                            <th>{{ $laporan->getTahunAjaranSemester()?->semester }}</th>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <th>{{ $laporan->created_at }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card p-3">
            <h6>Laporan Barang</h6>
            <hr>
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Laboratorium</th>
                            <th>Nama Barang</th>
                            <th>Nomor</th>
                            <th>Kondisi</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan->barang as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->barang->laboratorium->nomor }}</td>
                                <td>{{ $item->barang->jenis_barang->nama_barang }}</td>
                                <td>{{ $item->barang->nomor_barang }}</td>
                                <td>{{ $item->kondisi }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td><i
                                        class="{{ $item->approved ? 'text-success fas fa-fw fa-check' : 'text-danger fas fa-fw fa-times' }}"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex" style="gap: 5px">
                <form action="{{ route('laporan.persetujuan', $laporan) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm w-fit">
                        <i class="fas fa-fw fa-check"></i> Setujui Laporan
                    </button>
                </form>
                <form action="{{ route('laporan.tolak', $laporan) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm w-fit">
                        <i class="fas fa-fw fa-times"></i> Tolak Laporan
                    </button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
