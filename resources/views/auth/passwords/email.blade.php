@extends('layouts.home')

@section('content')
<div class="section">
    <div class="columns">
        <div class="column is-4 is-offset-4">
            <div class="box">
                <div class="title is-4">{{ __('Reset Password') }}</div>

                <div class="">
                    @if (session('status'))
                        <div class="notification is-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="field">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                            <div class="control">
                                <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="">
                            <div class="buttons">
                                <button type="submit" class="button is-primary">
                                    {{ __('passwords.send_password_reset_link') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

            @if ($errors->has('email'))
            <div class="notification is-danger" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
