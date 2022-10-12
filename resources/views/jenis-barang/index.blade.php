@extends('layouts.app')

@section('title', 'Jenis Barang')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Jenis Barang</h1>
            <a href="{{ route('jenis-barang.create') }}" class="btn btn-sm btn-primary"><i class=" fas fa-fw fa-plus"></i>
                Tambah Data</a>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissable mb-4">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $message }}
            </div>
        @endif

        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>dibuat</th>
                            <th>diubah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenisBarang as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at->diffForhumans() }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('jenis-barang.edit', $item) }}" class="btn p-0 text-warning">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        <form action="{{ route('jenis-barang.destroy', $item) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('yakin dihapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn p-0 text-danger">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $jenisBarang->links() }}
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
