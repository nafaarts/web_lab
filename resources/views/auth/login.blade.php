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

                <div class="text-center mt-5">
                    <h1 class="h4 mb-1"><b>{{ __('Pelaporan Fasilitas Laboratorium') }}</b></h1>
                    <h1 class="h4 mb-4">{{ __('Teknologi Informasi') }}</h1>
                </div>
                <hr>
                <form action="{{ route('login') }}" method="post" class="user">
                    @csrf

                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control form-control-user @error('email') is-invalid @enderror"
                            id="exampleInputEmail" aria-describedby="emailHelp"
                            placeholder="{{ __('Enter Email Address') }}" required autofocus>
                    </div>
                    @error('email')
                        <div class="form-group custom-control">
                            <label class="">{{ $message }}</label>
                        </div>
                    @enderror

                    <div class="form-group">
                        <input type="password" name="password"
                            class="form-control form-control-user @error('password') is-invalid @enderror"
                            id="exampleInputPassword" placeholder="{{ __('Password') }}" required>
                    </div>
                    @error('password')
                        <div class="form-group custom-control">
                            <label class="">{{ $message }}</label>
                        </div>
                    @enderror

                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" name="remember" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">{{ __('Remember Me') }}</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Login') }}
                    </button>

                    <center class="mt-4">
                        {!! NoCaptcha::display() !!}
                        {!! NoCaptcha::renderJs() !!}
                        @error('g-recaptcha-response')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </center>

                </form>
                @if (Route::has('password.request'))
                    <div class="text-center">
                        <a class="small" href="{{ route('password.request') }}">{{ __('Lupa Password?') }}</a>
                    </div>
                @endif
                @if (Route::has('register'))
                    <div class="text-center">
                        <a class="small" href="{{ route('register') }}">{{ __('Create New Account!') }}</a>
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection
