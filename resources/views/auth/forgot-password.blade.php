@extends('layouts.auth-base')

@section('title', 'Forgot Password')

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
                    <p class="text-center mt-3">Forgot your password? Enter your email address to receive a password reset link that will allow you to set a new one.</p>

                    @if (session('status'))
                        <div class="row">
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif

                    <form class="mt-4" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="email">Email</label>
                                    <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-block btn-primary">Email Password Reset Link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


