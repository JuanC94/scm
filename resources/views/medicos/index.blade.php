@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">{{ $title }}</h4>
                </div>
                <div class="card-content table-responsive">
                    @include('message.message')
                    <a href="{{ route('medicoCreate') }}" class="btn btn-primary"><li class="fa fa-plus"></li> Crear Medico</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($medicos->count())
                            @foreach($medicos as $medico)
                                <tr>
                                    <td>{{ $medico->documento }}</td>
                                    <td>{{ $medico->nombre }}</td>
                                    <td>{{ $medico->direccion }}</td>
                                    <td>{{ $medico->email }}</td>
                                    <td>{{ $medico->telefono }}</td>
                                    <td>
                                        <a href="{{ route('citaMedicoView', ['medico_id' => $medico->id]) }}" class="btn btn-primary btn-xs">Ver citas</a>
                                        <a href="{{ route('medicoEdit', ['id' => $medico->id]) }}" class="btn btn-warning btn-xs">Editar</a>
                                        <a href="{{ route('medicoDelete', ['id' => $medico->id]) }}" class="btn btn-danger btn-xs" onclick="return confirm('¿Estas seguro que deseas eliminar el medico?')">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" align="center">No se encontraron registros</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection