@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h4 mb-0 text-gray-800">Edit Barang</h1>
                <a href="{{ route('laboratorium.barang.show', [$laboratorium, $barang]) }}"
                    class="btn btn-sm btn-secondary"><i class=" fas fa-fw fa-arrow-left"></i>
                    Kembali</a>
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
                        <form action="{{ route('laboratorium.barang.update', [$laboratorium, $barang]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="jenis_barang" class="form-label">Jenis Barang</label>
                                    <input type="text" class="form-control" id="jenis_barang" readonly
                                        value="{{ $barang->jenis_barang->nama_barang }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_barang" class="form-label">Nomor Barang</label>
                                    <input type="text" name="nomor_barang"
                                        class="form-control @error('nomor_barang') is-invalid @enderror" id="nomor_barang"
                                        aria-describedby="nomor_barang" required
                                        value="{{ old('nomor_barang', $barang->nomor_barang) }}">
                                    @error('nomor_barang')
                                        <div id="nomor_barang" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kondisi" class="form-label">Kondisi Barang</label>
                                    <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror"
                                        id="kondisi" aria-describedby="kondisi">
                                        @foreach (['baik', 'rusak', 'hilang'] as $item)
                                            <option @selected(old('kondisi', $barang->kondisi()?->kondisi) == $item)>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('kondisi')
                                        <div id="kondisi" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan Barang</label>
                                    <input type="text" name="keterangan"
                                        class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                        aria-describedby="keterangan"
                                        value="{{ old('keterangan', $barang->kondisi()?->keterangan) }}">
                                    @error('keterangan')
                                        <div id="keterangan" class="invalid-feedback">
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
