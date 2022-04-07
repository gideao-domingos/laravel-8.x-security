@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4> {{ __('Editar Função') }}</h4>
                    </div>
                    <div class="card-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Erro(s)!</strong><br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nome:</strong>
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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
                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                            {{ $value->label }}</label>
                                        <br/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <p class="text-center text-primary"><small></small></p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Voltar</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

