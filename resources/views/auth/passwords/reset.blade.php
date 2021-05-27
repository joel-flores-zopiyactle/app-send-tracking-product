@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}   <a href="{{ route('login') }}"><b>Iniciar sesión</b></a>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}</a>
                </div>
            @endif
            <div class="card">
                <div class="card-header text-center">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form action="{{ route('update-password') }}"  method="POST">
                        @csrf

                       {{--  <input type="hidden" name="token" value="{{ $token }}">    --}}
                        <div class="form-group">

                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value=" {{ $email ?? old('email') }}" disabled required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="code">{{ __('Codígo de administrador') }}</label>
                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code">

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
