@extends('layouts.master')

@section('content')
    @component('components.card')
        @slot('header') User Login @endslot
        <form method="POST" action="{{ route('user.login.submit') }}">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                </div>
            </div>

            <div class="form-group row offset-md-4">
                <div class="col-sm-3 ">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="col-sm-9">Need an account? <a class="btn btn-link td-none pl-0" href="{{ route('user.create') }}">Sign Up</a></div><br>
            </div>

            <div class="row  offset-md-4 or-line">
                <div class="col-xs-12 col-sm-9">
                    <hr class="hr-or">
                    <span class="span-or">or</span>
                </div>
            </div>

            <div class="row offset-md-2 text-center">
                <div class="col-md-12">
                    <a href="{{ url('user/login/google') }}">
                        <img class="google-signin-btn" src="{{ asset('images/google-signin.png') }}">
                    </a>
                </div>
            </div>

            <div class="row offset-md-2 text-center mt-3">
                <div class="col-md-12">
                    <a href="{{ url('user/login/github') }}">
                        <img class="google-signin-btn" src="{{ asset('images/github-signin.png') }}">
                    </a>
                </div>
            </div>
        </form>
    @endcomponent

@endsection
