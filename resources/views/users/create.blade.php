@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Criar Novo Utilizador') }}</h4>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Erro(s)!</strong><br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nome:</strong>
                                        {!! Form::text('name', null, array('placeholder' => 'Nome','class' => 'form-control name')) !!}
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="erroname">{{ $message }}</strong>
                                            </span>
                                        @else
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="erroname"></strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control email')) !!}
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
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Palavra-Passe:</strong>
                                        {!! Form::password('password', array('placeholder' => 'Palavra-passe','class' => 'form-control password')) !!}
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
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Confirmar Palavra-passe:</strong>
                                        {!! Form::password('confirm-password', array('placeholder' => 'Confirmar Palavra-passe','class' => 'form-control confirm-password')) !!}
                                        @error('confirm-password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="erroconfirm-password">{{ $message }}</strong>
                                            </span>
                                        @else
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="erroconfirm-password"></strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Função:</strong>
                                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control roles','multiple')) !!}
                                        @error('roles')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="erroroles">{{ $message }}</strong>
                                            </span>
                                        @else
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="erroroles"></strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <a class="btn btn-primary" href="{{ route('users.index') }}"> Voltar</a>
                            </div>
                            <div class="col-6">
                                <button type="submit" id="btn_submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
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

            $('.name').on('input', function() {
                const name = $('.name');
                const nameTest = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;
                const erroname = $('.erroname');
                name.removeClass('is-invalid');
                name.removeClass('border-success');
                if(!nameTest.test(name.val())){
                    btnSubmit.prop('disabled', true);
                    name.addClass('is-invalid');
                    erroname.text('O nome deve conter apenas letras!');
                }else if(name.val().trim()==''){
                    btnSubmit.prop('disabled', true);
                    name.addClass('is-invalid');
                    erroname.text('O nome não deve estar em branco!');
                }else if(name.val().length < 5){
                    btnSubmit.prop('disabled', true);
                    name.addClass('is-invalid');
                    erroname.text('O nome deve ter mais de 5 caracteres!');
                }else{
                    btnSubmit.prop('disabled', false);
                    name.addClass('border-success');
                    erroname.text('');
                }
            });

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
                }else if(password.val().length < 8){
                    btnSubmit.prop('disabled', true);
                    password.addClass('is-invalid');
                    erropassword.text('Mínimo 8 caracteres!');
                }else{
                    btnSubmit.prop('disabled', false);
                    password.addClass('border-success');
                    erropassword.text('');
                }
            });

            $('.confirm-password').on('input', function() {
                const password = $('.password');
                const confirm_password = $('.confirm_password');
                const erro_confirm_password= $('.erroconfirm_password');
                confirm_password.removeClass('is-invalid');
                confirm_password.removeClass('border-success');
                if(password.val()== confirm_password.val()){
                    btnSubmit.prop('disabled', true);
                    confirm_password.addClass('is-invalid');
                    erro_confirm_password.text('A Palavra-passe não deve estar em branco!');
                }else if(confirm_password.val().trim()==''){
                    btnSubmit.prop('disabled', true);
                    confirm_password.addClass('is-invalid');
                    erro_confirm_password.text('A Palavra-passe não deve estar em branco!');
                }else if(confirm_password.val().length < 8){
                    btnSubmit.prop('disabled', true);
                    confirm_password.addClass('is-invalid');
                    erro_confirm_password.text('Mínimo 8 caracteres!');
                }else{
                    btnSubmit.prop('disabled', false);
                    confirm_password.addClass('border-success');
                    erro_confirm_password.text('');
                }
            });

            $('.imagem').on('input', function() {
                var imagem = $('.imagem')[0].files[0];
                var type = imagem.type;
                var size = parseFloat(imagem.size/(1024*1024)).toFixed(2);
                $('.imagem').removeClass('is-invalid');
                if(size > 4){
                    $('.imagem').addClass('is-invalid');
                    $('.erroimagem').text('A imagem deve ter no máximo 4MB.');
                }else if(type=="image/png" || type=="image/jpg" || type=="image/jpeg"){
                    $('.imagem').addClass('border-success');
                    $('.erroimagem').text('');
                }else{
                    $('.imagem').addClass('is-invalid');
                    $('.erroimagem').text('*tipos permitidos jpg, jpeg, png.');
                }
            });

            $('#botao_submeter').on('click', function(e) {
                var nascimento = $('.nascimento');
                var periodo_inicio = $('.periodo_inicio');
                var imagem = $('.imagem');
            });
        });
    </script>
@endsection
