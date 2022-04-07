@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4> {{ __(' Ver Função') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nome:</strong>
                                    {{ $role->label }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permissões:</strong>
                                    @forelse($rolePermissions as $permission)
                                        <label class="badge badge-success">{{ $permission->label }}</label>
                                    @empty
                                        <label class="label label-success">Nenhum dado para apresentar!</label>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div>
                                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
