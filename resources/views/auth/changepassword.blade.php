@extends('layouts.home')

@section('content')
<div class="section">
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <div class="box">
                <div class="title is-4">{{ __('auth.change_password') }}</div>

                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}

                        <div class="field{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="label">{{ __('auth.old_password') }}</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="input" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="label">{{ __('auth.new_password') }}</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="input" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="new-password-confirm" class="label">{{ __('auth.confirm_password') }}</label>

                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="input" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="button is-primary">
                                    {{ __('admin.confirmar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection