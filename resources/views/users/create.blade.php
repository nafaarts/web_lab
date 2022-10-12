@extends('layouts.app')

@section('title', 'Create Admin')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h4 mb-0 text-gray-800">Create Admin</h1>
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
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <input type="text" name="name"
                                        class="form-control form-control-sm  @error('name') is-invalid @enderror"
                                        placeholder="{{ __('Name') }}" value="{{ old('name') }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('name')
                                    <div class="form-group custom-control">
                                        <label class="">{{ $message }}</label>
                                    </div>
                                @enderror

                                <div class="input-group mb-3">
                                    <input type="email" name="email"
                                        class="form-control form-control-sm  @error('email') is-invalid @enderror"
                                        placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('email')
                                    <div class="form-group custom-control">
                                        <label class="">{{ $message }}</label>
                                    </div>
                                @enderror

                                <div class="input-group mb-3">
                                    <input type="password" name="password"
                                        class="form-control form-control-sm  @error('password') is-invalid @enderror"
                                        placeholder="{{ __('New password') }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="form-group custom-control">
                                        <label class="">{{ $message }}</label>
                                    </div>
                                @enderror

                                <div class="input-group mb-3">
                                    <input type="password" name="password_confirmation"
                                        class="form-control form-control-sm  @error('password_confirmation') is-invalid @enderror"
                                        placeholder="{{ __('New password confirmation') }}" autocomplete="new-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-primary">{{ __('Submit') }}</button>
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
