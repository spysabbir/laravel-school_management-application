@extends('layouts.auth_master')

@section('title', 'Forgot Password')

@section('content')
<div class="row">
    <div class="col-md-4 pe-md-0">
        <div class="auth-side-wrapper">

        </div>
    </div>
    <div class="col-md-8 ps-md-0">
        <div class="auth-form-wrapper px-4 py-5">
            <span class="noble-ui-logo logo-light d-block mb-2"><span>{{ config('app.name') }}</span></span>
            <h5 class="text-muted fw-normal mb-4">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h5>
            <form class="forms-sample" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-3">
                    <label for="userEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="userEmail" name="email" value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Email Password Reset Link</button>
                </div>
                <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Back to login</a>
            </form>
        </div>
    </div>
</div>
@endsection
