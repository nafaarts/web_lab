@extends('layouts.app')

@section('title', $barang->jenis_barang->nama_barang . " ($laboratorium->nomor)")

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">{{ $barang->jenis_barang->nama_barang }} - Lab {{ $laboratorium->nomor }}</h1>
            <a href="{{ route('laboratorium.show', $laboratorium) }}" class="btn btn-sm btn-secondary"><i
                    class=" fas fa-fw fa-arrow-left"></i>
                Kembali</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissable mb-4">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $message }}
            </div>
        @endif

        <div class="card p-3">
            <h5>Data Barang</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Nomor</th>
                            <th>Kondisi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_barang as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->jenis_barang->nama_barang }}</td>
                                <td>{{ $item->nomor_barang }}</td>
                                <td>{{ $item->kondisi()?->kondisi }}</td>
                                <td>{{ $item->kondisi()?->keterangan }}</td>
                                <td>
                                    <a href="{{ route('laboratorium.barang.edit', [$laboratorium, $item]) }}"
                                        class="btn p-0 text-warning">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <form action="{{ route('laboratorium.barang.destroy', [$laboratorium, $item]) }}"
                                        method="POST" class="d-inline" onsubmit="return confirm('yakin dihapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn p-0 text-danger">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- /.container-fluid -->
@endsection
