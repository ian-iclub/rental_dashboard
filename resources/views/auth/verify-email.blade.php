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
                    <p class="text-center mt-3">
                        Accounts created through the registration form must first be verified. Once this is done you will receive an email confirming that your account has been verified
                    </p>

                    <form class="mt-4" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-block btn-primary">Logout</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection





