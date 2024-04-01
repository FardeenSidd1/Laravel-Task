@extends('admin.layouts.app')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/login-register.css') }}">
@endsection
@section('content')
    <div class="content-header row">
    </div>
    <div class="content-body">
        <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                        <div class="card-header border-0">
                            <div class="text-center mb-1">
                                <a href="{{ route('frontend.index') }}" class="card-link">{{ _('Frontend') }} Click Here</a>

                            </div>
                            <div class="text-center">
                                <div id="sec-heading" class="font-large-1  text-center">
                                    {{ __('site.Login') }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    {{ \Session::get('success') }}
                                </div>
                            @endif
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}" novalidate>
                                @csrf
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="email" class="form-control round @error('email') is-invalid @enderror"
                                        id="user-name" placeholder="{{ __('E-Mail Address') }}" name="email"
                                        value="{{ old('email') }}" required>
                                    <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="password"
                                        class="form-control round  @error('password') is-invalid @enderror" name="password"
                                        id="user-password" placeholder="{{ __('Password') }}" required>
                                    <div class="form-control-position">
                                        <i class="ft-lock"></i>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                                <div class="row">
                                    <div class="form-group  col-md-6 col-12 text-center text-sm-left">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group  col-md-6 col-12 float-sm-left text-center text-sm-right">
                                        @if (Route::has('password.request'))
                                            <a class="card-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit"
                                        class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">{{ __('Login') }}</button>
                                </div>
                            </form>
                        </div>
                        <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1">
                            <span>{{ _('Don\'t have an account ?') }}
                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="card-link">{{ _('Sign Up') }}</a>
                                @endif
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
