@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail') }}</label>
                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control email @error('email') is-invalid @enderror"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autocomplete="email"
                                        autofocus
                                    >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="erroemail">{{ $message }}</strong>
                                        </span>
                                    @else
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="erroemail"></strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Palavra-passe') }}</label>
                                <div class="col-md-6">
                                    <input id="password"  type="password" class="form-control password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="erropassword">{{ $message }}</strong>
                                        </span>
                                    @else
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="erropassword"></strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Mantenha-me conectado.') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" id="btn_submit" class="btn btn-primary">
                                        {{ __('Entrar') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu a tua palavra-passe?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const btnSubmit = $("#btn_submit");

            function isEmail(email) {
                var EmailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                return EmailRegex.test(email);
            }

            $('.email').on('input', function() {
                const email = $('.email');
                const erroemail = $('.erroemail');
                email.removeClass('is-invalid');
                email.removeClass('border-success');
                if(!isEmail(email.val())){
                    btnSubmit.prop('disabled', true);
                    email.addClass('is-invalid');
                    erroemail.text('E-mail inválido!');
                }else{
                    btnSubmit.prop('disabled', false);
                    email.addClass('border-success');
                    erroemail.text('');
                }
            });

            $('.password').on('input', function() {
                const password = $('.password');
                const erropassword= $('.erropassword');
                password.removeClass('is-invalid');
                password.removeClass('border-success');
                if(password.val().trim()==''){
                    btnSubmit.prop('disabled', true);
                    password.addClass('is-invalid');
                    erropassword.text('A Palavra-passe não deve estar em branco!');
                }
            });

            $('#botao_submeter').on('click', function(e) {});
        });
    </script>
@endsection
