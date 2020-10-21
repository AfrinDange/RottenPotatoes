@extends('layouts.app')

@section('content')
<div class="container d-flex d-block pt-5 m-auto justify-content-center align-items-center">
    <div class="jumbotron jumbotron-fluid w-50 ml-lg-5 ml-md-0 p-5 mb-0 bg-gradient-info">
        <p class="display-4 text-monospace text-center">{{ __('Login') }}</p>
        <hr class="pt-3 pb-3">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label for="email" id="emaillabel" class="input-group-text">{{ __('E-Mail Address') }}</label>
                </div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="enter your email"
                name="email" value="{{ old('email') }}" aria-label="emaillabel" aria-describedby="emaillabel" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>              
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <label for="password" class="input-group-text" id="passwordlabel">{{ __('Password') }}</label>
                </div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="enter your password"
                    name="password" aria-label="passwordlabel" aria-describedby="passwordlabel" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> 
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-dark">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>                    
    </div>
</div>
@endsection