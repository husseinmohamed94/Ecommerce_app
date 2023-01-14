@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                    <div class="login-box">
                        <!-- /.login-logo -->
                        <div class="card card-outline card-primary">
                            <div class="card-header text-center">
                                ECOMMERCE
                            </div>
                            <div class="card-body">
                                <p class="login-box-msg">Sign in to start your session</p>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="icheck-primary">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>

                                        <!-- /.col -->


                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>

                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>

                                <div class="social-auth-links text-center mt-2 mb-3">
                                    <a href="#" class="btn btn-block btn-primary">
                                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                                    </a>
                                    <a href="#" class="btn btn-block btn-danger">
                                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                                    </a>
                                </div>
                                <!-- /.social-auth-links -->


                                <p class="mb-0">
                                    <a href="{{ route('register') }}" class="text-center">Register a new </a>
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

<!-- /.login-box -->


            </div>
        </div>
    </div>





@endsection










