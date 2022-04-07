@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-9">
                                <h4>{{ __('Gestão de Funções') }}</h4>
                            </div>
                            <div class="col-md-3 float-right">
                                @can('role-create')
                                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Criar nova Função</a>
                                @endcan
                           </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th>Nº</th>
                                <th>Nome</th>
                                <th width="280px">Acção</th>
                            </tr>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->label }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Ver</a>
                                        @can('role-edit')
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                        @endcan
                                        @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">
                        {!! $roles->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
