@extends('layouts.login')

@section('content')
<div class="reset-container">
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
                        <img src="{{'frontend/img/logo_nomads.png'}}" alt="" class="w-50 mb-4">
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">

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
                                <button type="submit" class="btn btn-login btn-block mt-3">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                    </form>
                </div>
             </div>
            </div>
        </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
@endsection
