@extends('auth.layouts.app')

@section('content')
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" src="{{ asset('') }}assets/img/Logo-dark.svg" alt="Logo">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Email Address</label>
                                    <input name="email" value="{{ old('email') }}" type="email" class="form-control">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input">
                                        <span class="fas fa-eye toggle-password"></span>
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cb1">
                                                <label class="custom-control-label" for="cb1">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-right">
                                            <a class="forgot-link" href="{{ url('forgot-password') }}">Forgot
                                                Password ?</a>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-block btn-primary" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
