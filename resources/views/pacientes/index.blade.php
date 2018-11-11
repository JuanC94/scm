@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="title">{{ $title }}</h4>
            </div>
            <div class="card-content table-responsive">
                @include('message.message')
                <a href="{{ route('pacienteCreate') }}" class="btn btn-primary"><li class="fa fa-plus"></li> Crear Paciente</a>
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
                    @if($pacientes->count())
                    @foreach($pacientes as $paciente)
                        <tr>
                            <td>{{ $paciente->documento }}</td>
                            <td>{{ $paciente->nombre }}</td>
                            <td>{{ $paciente->direccion }}</td>
                            <td>{{ $paciente->email }}</td>
                            <td>{{ $paciente->telefono }}</td>
                            <td>
                                <a href="{{ route('pacienteEdit', ['id' => $paciente->id]) }}" class="btn btn-warning btn-xs">Editar</a>
                                <a href="{{ route('pacienteDelete', ['id' => $paciente->id]) }}" class="btn btn-danger btn-xs" onclick="return confirm('¿Estas seguro que deseas eliminar el paciente?')">Eliminar</a>
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