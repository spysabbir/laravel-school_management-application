@extends('layouts.auth_master')

@section('title', 'Verify Email')

@section('content')
<div class="row">
    <div class="col-md-4 pe-md-0">
        <div class="auth-side-wrapper">

        </div>
    </div>
    <div class="col-md-8 ps-md-0">
        <div class="auth-form-wrapper px-4 py-5">
            <span class="noble-ui-logo logo-light d-block mb-2"><span>{{ config('app.name') }}</span></span>
            <h5 class="text-muted fw-normal mb-4">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</h5>
            @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success">
                A new verification link has been sent to the email address you provided during registration.
            </div>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Resend Verification Email</button>
                </div>
            </form>
            <form class="forms-sample" method="POST" action="{{ route('logout') }}">
                @csrf
                <div>
                    <button type="submit" class="btn btn-danger me-2 mb-2 mb-md-0 text-white">Log Out</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
