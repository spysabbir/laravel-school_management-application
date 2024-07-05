@extends('layouts.auth_master')

@section('title', 'Login')

@section('content')
<div class="row">
    <div class="col-md-4 pe-md-0">
        <div class="auth-side-wrapper">

        </div>
    </div>
    <div class="col-md-8 ps-md-0">
        <div class="auth-form-wrapper px-4 py-5">
            <span class="noble-ui-logo logo-light d-block mb-2"><span>{{ config('app.name') }}</span></span>
            <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="userEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="userEmail" name="email" value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="userPassword" name="password" placeholder="Password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                    <label class="form-check-label" for="remember_me">
                        Remember me
                    </label>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Login</button>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="btn text-primary btn-icon-text mb-2 mb-md-0">
                        Forgot your password?
                    </a>
                    @endif
                </div>
                <a href="{{ route('register') }}" class="d-block mt-3 text-muted">Not a user? Sign up</a>
            </form>
        </div>
    </div>
</div>
@endsection
