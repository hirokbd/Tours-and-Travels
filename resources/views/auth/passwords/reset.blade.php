@extends('layouts.app')

@section('content')
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">{{ __('Reset Password') }}</h3>
              <form method="POST" action="{{ route('password.update') }}">
                  @csrf

                  <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                  <label>{{ __('E-Mail Address') }}</label>
                  <input type="email" id="email" class="form-control p_input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                  <button type="submit" class="btn btn-primary btn-block enter-btn">{{ __('Reset Password') }}</button>
                </div>
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