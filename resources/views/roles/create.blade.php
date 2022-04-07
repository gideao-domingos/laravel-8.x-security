@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Criar Nova Função') }}
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

                        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nome:</strong>
                                        {!! Form::text('name', null, array('placeholder' => 'Nome','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Rótulo:</strong>
                                        {!! Form::text('label', null, array('placeholder' => 'Rótulo','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Permissiões:</strong>
                                        <br/>
                                        @foreach($permission as $value)
                                            <label>
                                                {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                {{ $value->label }}
                                            </label>
                                            <br/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="card-footer container-fluid">
                        <div class="row">
                            <div class="col-1">
                                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Voltar</a>
                            </div>
                            <div class="col-11">
                                <button type="submit" class="btn btn-primary">Submeter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
