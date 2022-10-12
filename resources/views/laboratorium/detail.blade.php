@extends('layouts.app')

@section('title', $laboratorium->nomor)

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Detail Laboratorium</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissable mb-4">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $message }}
            </div>
        @endif

        <div class="card p-3 mb-4">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('images/laboratorium/' . $laboratorium->image) }}" alt="gambar lab"
                        class="img-fluid">
                </div>
                <div class="col-md-9 d-flex align-items-center">
                    <div>
                        <h2>Lab {{ $laboratorium->nomor }}</h2>
                        <hr>
                        <div class="d-flex" style="gap: 15px">
                            <p>Jumlah barang : {{ $laboratorium->barang->count() }}</p>
                            <p>Jenis barang : {{ $barang->count() }}</p>
                        </div>
                        <div class="d-flex" style="gap: 5px">
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="fas fa-fw fa-plus"></i> Tambah barang
                            </button>
                            <a target="_blank" href="{{ route('laboratorium.print', $laboratorium) }}"
                                class="btn btn-secondary mt-3">
                                <i class="fas fa-fw fa-print"></i> Print
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-3">
            <h5>Data Barang</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->jenis_barang->nama_barang }}</td>
                                <td>{{ $item->total }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('laboratorium.barang.show', [$laboratorium, $item]) }}"
                                            class="btn btn-sm py-0 btn-primary">
                                            <i class="fas fa-fw fa-info"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="btn p-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-fw fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('laboratorium.barang.store', $laboratorium) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="jenis_barang" class="form-label">Jenis Barang</label>
                            <select name="jenis_barang" class="form-control @error('jenis_barang') is-invalid @enderror"
                                id="jenis_barang" required>
                                @foreach ($jenis_barang as $item)
                                    <option value="{{ $item->id }}" @selected(old('jenis_barang') == $item->id)>
                                        {{ $item->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                            <input type="number" name="jumlah_barang"
                                class="form-control @error('jumlah_barang') is-invalid @enderror" id="jumlah_barang"
                                aria-describedby="jumlah_barang" required value="{{ old('jumlah_barang', 1) }}"
                                min="1">
                            @error('jumlah_barang')
                                <div id="jumlah_barang" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
