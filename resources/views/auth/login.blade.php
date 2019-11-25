@extends('layouts.create-app')
@section('content')
<div class="container-fluid the-container2 p-5 ">
    <div class="row justify-content-center align-items-center  w-100">
        <div class="col-sm-8 col-md-6 col-lg-4">
            <center class="">
                <div class="the-form p-md-5 px-5">
                        <div class="the-txt mb-3">
                                <h2 class="text-capitalize text-left mb-3">login</h2>
                                <p class="paragraph text-left">Input your credentials to continue</p>
                                <hr class="color-white">
                            </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <label for="email" class="float-left">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password" class="float-left">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <div class="form-check">
                                    <input class="form-check-input d-flex opacity-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label float-left" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn2 w-100">
                                    {{ __('Login') }}
                                </button>

                                <div class="col-12 pt-3 px-0">
                                        @if (Route::has('password.request'))
                                        <a class="text-capitalize text-white float-left" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mt-3 col-6 d-flex align-items-center justify-content-center"> <img src="../img/nouveta-white.png" class="responsive-img"> </div>
            </center>
        </div>
    </div>
</div>


@endsection
