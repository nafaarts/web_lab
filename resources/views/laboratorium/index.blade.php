@extends('layouts.app')

@section('title', 'Laboratorium')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Laboratorium</h1>
            <a href="{{ route('laboratorium.create') }}" class="btn btn-sm btn-primary"><i class=" fas fa-fw fa-plus"></i>
                Tambah laboratorium</a>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissable mb-4">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $message }}
            </div>
        @endif

        <div class="row">
            @foreach ($laboratorium as $laboratoria)
                <div class="col-md-3 col-sm-12 mb-4">
                    <div class="card">
                        <a href="{{ route('laboratorium.show', $laboratoria) }}">
                            <img src="{{ asset('images/laboratorium/' . $laboratoria->image) }}" class="card-img-top"
                                alt="laboratorium">
                        </a>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="m-0"><b>{{ $laboratoria->nomor }}</b></h4>
                                <div>
                                    <a href="{{ route('laboratorium.edit', $laboratoria) }}" class="btn p-0 text-warning">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <form action="{{ route('laboratorium.destroy', $laboratoria) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('yakin dihapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn p-0 text-danger">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
