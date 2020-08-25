@extends('layouts.app')

@section('content')
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">{{ __('Sign Up') }}</h3>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <label>{{ __('Name') }}</label>
                  <input type="text" id="name" class="form-control p_input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>{{ __('E-Mail Address') }}</label>
                  <input type="email" id="email" class="form-control p_input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>{{ __('Password') }}</label>
                  <input type="password" id="password" class="form-control p_input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>{{ __('Confirm Password') }}</label>
                  <input type="password" id="password-confirm" class="form-control p_input" name="password_confirmation" required autocomplete="new-password">

                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">{{ __('Register') }}</button>
                </div>
             <!--   <div class="d-flex justify-content-center mb-4">
                  <a href="#" class="facebook-login btn btn-facebook mr-2">Facebook</a>
                  <a href="#" class="google-login btn btn-google">Google+</a>
                </div>-->
                <small class="text-center d-block mb-3">Already have an Account?<a href="{{ route('login') }}">{{ __('Login') }}</a></small>
                <small class="text-center d-block">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></small>
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
