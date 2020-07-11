@extends('customer.layouts.defaults')

@section('content')

<div class="container-fluid w3-padding-32">
<div class="row">
<div class="offset-lg-3 col-lg-6 offset-md-2 col-md-8">
<div class="w3-card-4">
  <div class="w3-container w3-brown w3">
    <h2>{{ __('Login') }}</h2>
  </div>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="w3-padding">
        <div class="form-group w3-padding-left">
            <label for="email" class="w3-text-brown">{{ __('E-Mail Address:') }}</label>

            <div>
                <input id="email" type="email" class="form-control w3-sand @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>     
        <div class="form-group">
            <label for="password" class="w3-text-brown">{{ __('Password:') }}</label>
            <input id="password" type="password" class="form-control w3-sand @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="w3-btn w3-brown">{{ __('Login') }}</button></p>
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div>
  </form>
</div>
</div>
</div>
</div>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

@if(session('status'))
        {!! Toastr::message() !!}
    @endif
@endsection
