@extends('layouts.auth_master')

@section('title', 'Reset Password')

@section('content')
<div class="row">
    <div class="col-md-4 pe-md-0">
        <div class="auth-side-wrapper">

        </div>
    </div>
    <div class="col-md-8 ps-md-0">
        <div class="auth-form-wrapper px-4 py-5">
            <span class="noble-ui-logo logo-light d-block mb-2"><span>{{ config('app.name') }}</span></span>
            <h5 class="text-muted fw-normal mb-4"></h5>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="mb-3">
                    <label for="userEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="userEmail" name="email" value="{{ old('email', $request->email) }}" placeholder="Email">
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
                <div class="mb-3">
                    <label for="userConfirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="userConfirmPassword" name="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
