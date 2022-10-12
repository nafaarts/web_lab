@extends('layouts.app')

@section('title', 'Edit Laboratorium')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h4 mb-0 text-gray-800">Edit Laboratorium</h1>
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
                        <form action="{{ route('laboratorium.update', $laboratorium) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nomor" class="form-label">Nomor Laboratorium</label>
                                    <input type="text" name="nomor"
                                        class="form-control @error('nomor') is-invalid @enderror" id="nomor"
                                        aria-describedby="nomor" required value="{{ old('nomor', $laboratorium->nomor) }}">
                                    @error('nomor')
                                        <div id="nomor" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Foto Laboratorium</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror" id="image"
                                        aria-describedby="image">
                                    @error('image')
                                        <div id="image" class="invalid-feedback">
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
