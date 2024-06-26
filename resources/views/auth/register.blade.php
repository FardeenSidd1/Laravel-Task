@extends('admin.layouts.app')

@section('content')
<section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="text-center mb-1">
                        <img src="{{asset('app-assets/images/logo/logo.png')}}" alt="branding logo">
                    </div>
                    <div class="font-large-1  text-center">
                        {{ __('Register') }}                    
                    </div>
                </div>
                <div class="card-content">

                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('register') }}" method="POST" novalidate>
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control round @error('name') is-invalid @enderror"  name="name" id="name" placeholder="Choose Name" required>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="email" class="form-control round @error('email') is-invalid @enderror" name="email" id="email" placeholder="Your Email Address" required>
                                <div class="form-control-position">
                                    <i class="ft-mail"></i>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control round @error('password') is-invalid @enderror" id="password"  name="password" placeholder="Enter Password" required>
                                <div class="form-control-position">
                                    <i class="ft-lock"></i>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </fieldset>

                            <fieldset class="form-group position-relative has-icon-left">
                                <input id="password-confirm" type="password" class="form-control round" name="password_confirmation" required autocomplete="new-password">
                                <div class="form-control-position">
                                    <i class="ft-lock"></i>
                                </div>
                            </fieldset>

                            <div class="form-group text-center">
                                <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Register</button>
                            </div>

                        </form>
                    </div>
                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-2 ">
                        <span>OR Sign Up Using</span>
                    </p>
                    

                    <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1">
                        <span>Already a member ?
                            <a href="login.html" class="card-link">Sign In</a>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
