@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="login-box">
                <div class="login-logo">
                    <a href="../../index2.html"><b>MiniShop</b>Login</a>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control"name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Password"  name="password" required autocomplete="current-password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            @endif

                            <!-- /.col -->
                            </div>
                        </div>
                    </form>

                    <div class="social-auth-links text-center">

                    </div>
                    <!-- /.social-auth-links -->

                    <a href="#">I forgot my password</a><br>


                </div>
                <!-- /.login-box-body -->
            </div>
        </div>
    </div>
@endsection
