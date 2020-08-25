@extends('layouts.app')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            <div class="row">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">{{ __('Login') }}</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>{{ __('E-Mail Address *') }}</label>
                                    <input type="email" id="email" class="form-control p_input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Password *') }}</label>
                                    <input type="password" id="password" class="form-control p_input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="icheck-square">
                                        <input tabindex="1" type="checkbox" id="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">{{ __('Remember Me') }}</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="forgot-pass" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">{{ __('Login') }}</button>
                                </div>
                            <!--    <div class="d-flex justify-content-center mb-4">
                                    <a href="#" class="facebook-login btn btn-facebook mr-2">Facebook</a>
                                    <a href="#" class="google-login btn btn-google">Google+</a>
                                </div>-->
                                <small class="text-center d-block">Don't have an Account?<a href="{{ route('register') }}">{{ __('Sign Up') }}</a></small>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
