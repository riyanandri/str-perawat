@extends('layouts.auth')

@section('content')
<div class="auth-form">
    {{-- <div class="text-center mb-3">
        <a href="index.html"><img src="images/logo-full.png" alt=""></a>
    </div> --}}
    <h4 class="text-center mb-4">STR Perawat</h4>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="mb-1"><strong>Nama Lengkap</strong></label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span class="text-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
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
        <div class="mb-3">
            <label class="mb-1"><strong>Konfirmasi Password</strong></label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Login</a></p>
    </div>
</div>
@endsection