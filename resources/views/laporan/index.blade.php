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

        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Pelapor</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $item)
                            <tr class="{{ $item->di_lihat == 0 ? 'table-warning' : '' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td><b>{{ $item->pelapor->nama }}</b></td>
                                <td>{{ $item->getTahunAjaranSemester()?->tahun_ajaran ?? '-' }}</td>
                                <td>{{ $item->getTahunAjaranSemester()?->semester ?? '-' }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('laporan.show', $item) }}" class="btn py-0 btn-info">
                                        <i class="fas fa-fw fa-eye"></i> Lihat
                                    </a>
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
