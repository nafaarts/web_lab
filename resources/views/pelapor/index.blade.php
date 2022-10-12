@extends('layouts.app')

@section('title', 'Pelapor')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Pelapor</h1>
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
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Email</th>
                            <th>Melapor pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelapor as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->updated_at->diffForhumans() }}</td>
                                <td>
                                    <form action="{{ route('pelapor.destroy', $item) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('yakin dihapus?')">
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

                {{ $pelapor->links() }}
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
