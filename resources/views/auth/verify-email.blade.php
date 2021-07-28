@extends('layouts.auth-base')

@section('title', 'Verify Email')

@section('content')

    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
         style="background:url({{ asset('images/auth/bg.jpg') }}) no-repeat center center;">
        <div class="auth-box row">
            <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{ asset('images/auth/forgot-password-form.png') }});">
            </div>
            <div class="col-lg-5 col-md-7 bg-white">
                <div class="p-3">
                    <div class="text-center">
                        <img src="{{ asset('images/auth/forgot-password-form-top.png') }}" alt="login" style="width: 60px">
                    </div>
                    <p class="text-center mt-3">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>

                    @if (session('status') == 'verification-link-sent')
                        <p class="text-center mt-3 text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </p>
                    @endif

                    <form class="mt-4" method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-block btn-primary">Resend Verification Email</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection





