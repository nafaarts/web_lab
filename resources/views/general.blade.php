@extends('layouts.app')

@section('title', 'Data Umum')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h4 mb-0 text-gray-800">Data Umum</h1>
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
                        <form action="{{ route('general.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                                    <input type="text" name="tahun_ajaran"
                                        class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran"
                                        aria-describedby="tahun_ajaran" required placeholder="2020/2021"
                                        value="{{ old('tahun_ajaran', $data?->tahun_ajaran) }}">
                                    @error('tahun_ajaran')
                                        <div id="tahun_ajaran" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <select name="semester" id="semester" class="form-control">
                                        @foreach (['ganjil', 'genap'] as $item)
                                            <option @selected(old('semester', $data?->semester) == $item)>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kaprodi" class="form-label">Kepala Program Studi</label>
                                    <input type="text" name="kaprodi"
                                        class="form-control @error('kaprodi') is-invalid @enderror" id="kaprodi"
                                        aria-describedby="kaprodi" required value="{{ old('kaprodi', $data?->kaprodi) }}">
                                    @error('kaprodi')
                                        <div id="kaprodi" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nrp_kaprodi" class="form-label">NRP Kepala Program Studi</label>
                                    <input type="text" name="nrp_kaprodi"
                                        class="form-control @error('nrp_kaprodi') is-invalid @enderror" id="nrp_kaprodi"
                                        aria-describedby="nrp_kaprodi" required
                                        value="{{ old('nrp_kaprodi', $data?->nrp_kaprodi) }}">
                                    @error('nrp_kaprodi')
                                        <div id="nrp_kaprodi" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kalab" class="form-label">Kepala Laboratorium</label>
                                    <input type="text" name="kalab"
                                        class="form-control @error('kalab') is-invalid @enderror" id="kalab"
                                        aria-describedby="kalab" required value="{{ old('kalab', $data?->kalab) }}">
                                    @error('kalab')
                                        <div id="kalab" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nrp_kalab" class="form-label">NRP Kepala Laboratorium</label>
                                    <input type="text" name="nrp_kalab"
                                        class="form-control @error('nrp_kalab') is-invalid @enderror" id="nrp_kalab"
                                        aria-describedby="nrp_kalab" required
                                        value="{{ old('nrp_kalab', $data?->nrp_kalab) }}">
                                    @error('nrp_kalab')
                                        <div id="nrp_kalab" class="invalid-feedback">
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
