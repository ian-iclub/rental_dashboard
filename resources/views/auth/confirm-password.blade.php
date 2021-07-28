@extends('layouts.auth-base')

@section('title', 'Confirm Password')

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
                    <p class="text-center mt-3">This is a secure area of the application. Please confirm your password before continuing.</p>

                    <form class="mt-4" method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="pwd">Password</label>
                                    <input class="form-control" id="pwd" type="password" name="password" required autocomplete="current-password" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-block btn-primary">Confirm Password</button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="btn btn-sm btn-block btn-success">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




