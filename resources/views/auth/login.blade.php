@extends('layouts.login')

@section('content')

<div class="login-container">
<div class="container">
    <div class="row page-login d-flex align-items-center">
        <div class="section-left col-12 col-md-6">
            <h1 class="mb-4">
                We Explore The New
                <br>
                life much better
            </h1>
            <img src="{{url('frontend/img/pic_explore.png')}}" alt="" class="w-75 d-none d-sm-flex">
        </div>
        <div class="section-right col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{'frontend/img/logo-travel.png'}}" alt="" class="w-50 mb-2">
                    </div>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    login dengan username: admin@mail.com, password: password
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-login btn-block mt-3">
                                    {{ __('Login') }}
                                </button>

                                <p class="text-center mt-2 ">
                                    <a class="btn btn-link" style="color: black; opacity : 0.8; text-decoration:none" href="{{ route('register') }}">
                                        {{ __('Dont have an account, please register') }}
                                    </a>
                                     @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </p>

                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
