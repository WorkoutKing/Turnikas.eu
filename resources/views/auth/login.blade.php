@include('partials._nav')
@extends('main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-l">
                <div class="card-header-l">{{ __('Login') }}</div>

                <div class="card-body-l">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="full_form">
                            <div class="full_form_lvl">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="full_form">
                            <div class="full_form_lvl">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="rememb_extra">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="login_extra">
                                <button type="submit" class="btn btn-primary login-btn-x">
                                    SIGN IN
                                </button>

                                @if (Route::has('password.request'))
                                <div class="return-acc">
                                    {{--  <a href="{{ route('password.request') }}">
                                        Forgot Your Password? •</a>  --}}
                                    <a href="/register"> Dont have an account yet ? • Create account</a>
                                </div>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="profile_p login_extra_shape">
        <div class="block_5_decoration"></div>
    </div>
@endsection
