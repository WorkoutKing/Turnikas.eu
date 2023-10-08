@include('partials._nav')
@extends('main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-l">
                <div class="card-header-l">{{ __('Create Account') }}</div>

                <div class="card-body-l">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="full_form">
                            <div class="full_form_lvl">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="full_form">
                            <div class="full_form_lvl">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="full_form">
                            <div class="full_form_lvl">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="full_form">
                            <div class="full_form_lvl">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="privacy-policy-acce">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="privacy_policy" id="privacy_policy" required>
                                    <label class="form-check-label" for="privacy_policy">
                                        I accept the <a href="{{ route('privacy-policy') }}" target="_blank">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="register-button-pos">
                            <div class="">
                                <button type="submit" class="btn btn-primary login-btn-x">
                                    CREATE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="profile_p register-extra-shape">
        <div class="block_6_decoration"></div>
        <div class="block_7_decoration"></div>
        <div class="block_8_decoration"></div>
    </div>
@endsection
