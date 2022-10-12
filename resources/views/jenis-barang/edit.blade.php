@extends('layouts.app')

@section('title', 'Edit Jenis Barang')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h4 mb-0 text-gray-800">Edit Jenis Barang</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-primary alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ $message }}
                        </div>
                    @endif

                    <div class="card">
                        <form action="{{ route('jenis-barang.update', $jenis_barang) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input type="text" name="nama_barang"
                                        class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang"
                                        aria-describedby="nama_barang" required
                                        value="{{ old('nama_barang', $jenis_barang->nama_barang) }}">
                                    @error('nama_barang')
                                        <div id="nama_barang" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
