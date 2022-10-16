@extends('layouts.guest')

@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center" style="height: 100vh">

        <div class="col-lg-6">
            <div class="p-5 card">

                <center>
                    <img src="https://www.politeknikaceh.ac.id/download.php?file=190612110030Lambang%20Politeknik%20Aceh.png"
                        alt="Politeknik Aceh" width="150">
                </center>
                <div class="text-center mt-4">
                    <h1 class="h4 text-gray-900 mb-2">{{ __('Lupa Password') }}</h1>
                </div>
                <hr>
                @if ($message = Session::get('status'))
                    <div class="alert alert-primary alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ $message }}
                    </div>
                @endif
                <form class="user" action="{{ route('password.email') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control form-control-user @error('email') is-invalid @enderror"
                            id="exampleInputEmail" aria-describedby="emailHelp" placeholder="{{ __('Masukan Email') }}">
                    </div>
                    @error('email')
                        <div class="form-group custom-control">
                            <label class="">{{ $message }}</label>
                        </div>
                    @enderror

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Reset My Password') }}
                    </button>
                </form>
                <hr>
                @if (Route::has('login'))
                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">{{ __('Sudah punya akun, Masuk saja') }}</a>
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection
