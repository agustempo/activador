@extends('layouts.home')

@section('content')
<div class="section">
    <div class="columns">
        <div class="column is-4 is-offset-4">
            <div class="box">
                <div class="title is-4">{{ __('auth.login') }}</div>

                <div class="" >
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="field">
                            <label for="email" class="label">{{ __('auth.email') }}</label>

                            <div class="control has-icons-left has-icons-right">
                                <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                <span class="icon is-small is-left">
                                  <i class="fas fa-envelope"></i>
                                </span>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="password" class="label">{{ __('auth.password') }}</label>

                            <div class="control has-icons-left has-icons-right">
                                <input id="password" type="password" class="input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <span class="icon is-small is-left">
                                  <i class="fas fa-lock"></i>
                                </span>

                                @if ($errors->has('password'))
                                    <span class="notification is-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <!--  <div class="field">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <label class="checkbox" for="remember">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{ __('auth.remember_me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="">
                            <div class="buttons">
                                <button type="submit" class="button is-primary">
                                    {{ __('auth.login') }}
                                </button>

                               <!--  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('auth.forgot_password') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
