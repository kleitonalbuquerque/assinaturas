@extends('templates.srtdash.logintemplate')

@section('content')

    <div class="login-box ptb--100">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login-form-head">
                <h4>{{ __('Assinatura de e-mail') }}</h4>
            </div>
            <div class="login-form-body">
                <div class="form-gp">
                    <label for="email">{{ __('Seu E-Mail') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    <i class="ti-email"></i>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-gp">
                    <label for="password">{{ __('Senha') }}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <i class="ti-lock"></i>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row mb-4 rmber-area">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customControlAutosizing">{{ __('Manter logado') }}</label>
                        </div>
                    </div>
                    @if (Route::has('password.request'))
                    <div class="col-6 text-right">
                        <a href="{{ route('password.request') }}">{{ __('Esqueceu a senha?') }}</a>
                    </div>
                    @endif
                </div>
                <div class="submit-btn-area">
                    <button id="form_submit" type="submit">{{ __('Entrar') }} <i class="ti-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </div>

@endsection