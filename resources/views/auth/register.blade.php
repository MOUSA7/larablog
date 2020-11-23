<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by School</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('assets/register/fonts/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assets/register/css/style.css')}}">
</head>
<body>

<div class="main">

    <section class="signup">
{{--                <img src="{{asset('assets/register/images/signup-bg.jpg')}}" alt="">--}}
        <div class="container">
            <div class="signup-content">
                <form method="POST" action="{{ route('register') }}" id="signup-form" class="signup-form">
                    @csrf
                    <h2 class="form-title">Create account</h2>
                    <div class="form-group">
                        <input type="text" class="form-input  @error('name') is-invalid @enderror" name="name" placeholder="Your Name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong class="msg">{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input @error('email') is-invalid @enderror" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" required autocomplete="email"/>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong class="msg">{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required autocomplete="new-password"/>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong class="msg">{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password_confirmation" id="password-confirm" placeholder="Repeat your password" required autocomplete="new-password"/>
                    </div>
                    <div class="form-group">
                        <button type="submit"  class="form-submit " >
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
                <p class="loginhere">
                    Have already an account ? <a href="/login" class="loginhere-link">Login here</a>
                </p>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="{{asset('assets/register/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/register/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>





{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
