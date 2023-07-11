@extends('layouts.auth')

@section('content')
<div class="auth-form">
    {{-- <div class="text-center mb-3">
        <a href="index.html"><img src="images/logo-full.png" alt=""></a>
    </div> --}}
    <h4 class="text-center mb-4">STR Perawat</h4>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="mb-1"><strong>Email</strong></label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="text-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label class="mb-1"><strong>Password</strong></label>
            <input id="password" type="password" class="form-control" name="password">
            @if ($errors->has('password'))
                <span class="text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="row d-flex justify-content-between mt-4 mb-2">
            <div class="mb-3">
               <div class="form-check custom-checkbox ms-1">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
            </div>
            @if (Route::has('password.request'))
            <div class="mb-3">
                <a href="{{ route('password.request') }}">Forgot Password?</a>
            </div>
            @endif
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Register</a></p>
    </div>
</div>
@endsection