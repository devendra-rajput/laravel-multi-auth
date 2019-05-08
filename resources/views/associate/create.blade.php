@extends('layouts.master')

@section('content')

    @component('components.card')
        @slot('header') Associate Signup @endslot
        <form method="POST" action="{{ route('associate.store') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name<span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email<span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Phone<span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <input id="email" type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password<span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirm Password<span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <input id="confirm_password" type="password" class="form-control {{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" name="confirm_password" required>
                    @if ($errors->has('confirm_password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('confirm_password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row offset-md-4">
                <div class="col-sm-3 ">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
                <div class="col-sm-9">Have an account? <a class="btn btn-link td-none pl-0" href="{{ route('associate.login') }}">Sign In</a></div>
            </div>
        </form>
    @endcomponent

@endsection
