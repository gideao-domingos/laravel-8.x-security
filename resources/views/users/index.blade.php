@extends('layouts.app')


@section('content')
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-9">
                                <h4>{{ __('Gestão de Utilizadores') }}</h4>
                            </div>
                            <div class="col-md-3 float-right">
                                <a class="btn btn-success" href="{{ route('users.create') }}"> Criar Novo Utilizador</a>
                           </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2></h2>
                                </div>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Funções</th>
                                <th width="280px">Acção</th>
                            </tr>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <label class="badge badge-success">{{ $role->label }}</label>
                                        @endforeach
                                    </td>
                                    <td>
                                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Ver</a>
                                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                    <div class="card-footer">
                        {!! $data->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')

@endsection
