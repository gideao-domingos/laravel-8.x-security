@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>{{ __('Editar Utilizador') }}</h4></div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Erros.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
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
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Palavra-passe:</strong>
                                        {!! Form::password('password', array('placeholder' => 'Palavra-passe','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Confirmar Palavra-passe:</strong>
                                        {!! Form::password('confirm-password', array('placeholder' => 'Confirmar Palavra-Passe','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Funções:</strong>

                                        {!! Form::select('roles[]', $roles , $userRole, array('class' => 'form-control','multiple')) !!}
                                    </div>
                                </div>

                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6 margin-tb">
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Voltar</a>
                                </div>
                            </div>

                            <div class="col-lg-6 margin-tb">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scrips')

@endsection
