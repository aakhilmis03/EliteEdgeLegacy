@extends('admin.layouts.auth_app')

@section('content')

<div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-10">
                <div class="card card-default mb-0">
                    <div class="card-header pb-0">
                        <!-- <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                            <a class="w-auto pl-0" href="#">
                                <img src="{{url('admin_assets')}}/images/logo.png" alt="Autobest" >
                            </a>
                        </div> -->
                    </div>
                    <div class="card-body px-5 pb-5 pt-0">
                        <h4 class="text-dark mb-6 text-center">{{ __('Login') }}</h4>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input id="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email Address') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 ">
                                    <input id="password" type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Enter Password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between mb-3">
                                    <div class="custom-control custom-checkbox mr-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="text-color" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-pill mb-4">{{ __('Login') }}</button>
                                </div>
                            </div>
                        </form>
</div>
                  
                </div>
              </div>
            </div>
          </div>


@endsection
