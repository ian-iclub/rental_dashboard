@extends('layouts.auth-base')

@section('title', 'Register')

@section('content')

    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
         style="background:url({{ asset('images/auth/bg.jpg') }}) no-repeat center center;">
        <div class="auth-box row">
            <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{ asset('images/auth/register-form.png') }});">
            </div>
            <div class="col-lg-5 col-md-7 bg-white">
                <div class="p-3">
                    <div class="text-center">
                        <img src="{{ asset('images/auth/register-form-top.png') }}" alt="register" style="width: 60px">
                    </div>
                    <form class="mt-4" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="name">Name</label>
                                    <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="email">Email</label>
                                    <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="pwd">Password</label>
                                    <input class="form-control" id="pwd" type="password" name="password" required autocomplete="new-password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="c_pwd">Confirm Password</label>
                                    <input class="form-control" id="c_pwd" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-block btn-primary">Register</button>
                            </div>
                            <div class="col-lg-12 text-center mt-5">
                                Already Registered? <a href="{{ route('login') }}" class="text-danger">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


