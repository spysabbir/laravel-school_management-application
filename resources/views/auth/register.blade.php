@extends('layouts.auth_master')

@section('title', 'Register')

@section('content')
<div class="row">
    <div class="col-md-4 pe-md-0">
        <div class="auth-side-wrapper">

        </div>
    </div>
    <div class="col-md-8 ps-md-0">
        <div class="auth-form-wrapper px-4 py-5">
            <span class="noble-ui-logo logo-light d-block mb-2"><span>{{ config('app.name') }}</span></span>
            <h5 class="text-muted fw-normal mb-4">Create a free account.</h5>
            <form class="forms-sample" action="{{ route('register') }}" method="POST">
                <input type="hidden" name="referral_code" value="{{ $referral_code }}">
                @csrf
                <div class="mb-3">
                    <label for="userName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="userName" name="name" value="{{ old('name') }}" placeholder="Name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="userEmail" class="form-label">Email Address</label>
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
                <div class="mb-3">
                    <label for="userConfirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="userConfirmPassword" name="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="termsConditions" name="terms_conditions">
                        <label class="form-check-label" for="termsConditions">
                            I agree to the <a href="#" class="text-primary">terms and conditions.</a>
                        </label>
                    </div>
                    @error('terms_conditions')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary text-white me-2 mb-2 mb-md-0">Sign up</button>
                </div>
                <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Already a user? Sign in</a>
            </form>
        </div>
    </div>
</div>
@endsection
