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
                    <a href="{{ route('citaCreate') }}" class="btn btn-primary"><li class="fa fa-plus"></li> Crear Cita</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Asunto</th>
                            <th>Paciente</th>
                            <th>Medico</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($citas->count())
                            @foreach($citas as $cita)
                            <tr>
                                <td>{{ $cita->asunto }}</td>
                                <td>{{ $cita->paciente->nombre }}</td>
                                <td>{{ $cita->medico->nombre }}</td>
                                <td>{{ $cita->fecha }}</td>
                                <td>{{ $cita->hora }}</td>
                                <td>
                                    <a href="{{ route('citaEdit', ['id' => $cita->id]) }}" class="btn btn-warning btn-xs">Editar</a>
                                    <a href="{{ route('citaDelete', ['id' => $cita->id]) }}" class="btn btn-danger btn-xs" onclick="return confirm('¿Estas seguro que deseas eliminar la cita?')">Eliminar</a>
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