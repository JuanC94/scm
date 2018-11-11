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
                <form class="form-horizontal" method="POST" action="@if($action == 'create') {{ route('citaStore') }} @else {{ route('citaUpdate', ['id' => $cita->id]) }} @endif" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="asunto" class="col-md-2 control-label">Asunto</label>
                        <div class="col-md-8">
                            <input type="text" name="asunto" required class="form-control" placeholder="Asunto" value="{{ $cita->asunto }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="paciente_id" class="col-md-2 control-label">Paciente</label>
                        <div class="col-md-8">
                            <select name="paciente_id" class="form-control" required>
                                <option value>Seleccione</option>
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}" @if($cita->paciente_id == $paciente->id) selected @endif>{{ $paciente->documento . ' - ' . $paciente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="medico_id" class="col-md-2 control-label">Medico</label>
                        <div class="col-md-8">
                            <select name="medico_id" class="form-control" required>
                                <option value>Seleccione</option>
                                @foreach($medicos as $medico)
                                    <option value="{{ $medico->id }}" @if($cita->medico_id == $medico->id) selected @endif>{{ $medico->documento . ' - ' . $medico->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-md-2 control-label">Fecha/Hora</label>
                        <div class="col-md-4">
                            <input type="date" name="fecha" required class="form-control" placeholder="Fecha" value="{{ $cita->fecha }}">
                        </div>
                        <div class="col-md-4">
                            <input type="time" name="hora" required class="form-control" placeholder="Hora" value="{{ $cita->hora }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enfermedades" class="col-md-2 control-label">Enfermedades</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="enfermedades" placeholder="Enfermedades">{{ $cita->enfermedades }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sintomas" class="col-md-2 control-label">Sintomas</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="sintomas" placeholder="Sintomas">{{ $cita->sintomas }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="medicamentos" class="col-md-2 control-label">Medicamentos</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="medicamentos" placeholder="Medicamentos">{{ $cita->medicamentos }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estado_cita" class="col-md-2 control-label">Estado de la cita</label>
                        <div class="col-md-8">
                            <select name="estado_cita" class="form-control" required>
                                @foreach($estadosCita as $estadoCita)
                                <option value="{{ $estadoCita }}" @if($cita->estado_cita == $estadoCita) selected @endif>{{ $estadoCita }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estado_pago" class="col-md-2 control-label">Estado del pago</label>
                        <div class="col-md-8">
                            <select name="estado_pago" class="form-control" required>
                                @foreach($estadosPago as $estadoPago)
                                    <option value="{{ $estadoPago }}" @if($cita->estado_pago == $estadoPago) selected @endif>{{ $estadoPago }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="precio" class="col-md-2 control-label">Precio</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                <input type="text" class="form-control" name="precio" placeholder="Precio" value="{{ $cita->precio }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="metodo_pago" class="col-md-2 control-label">Metodo de pago</label>
                        <div class="col-md-8">
                            <select name="metodo_pago" class="form-control" required>
                                @foreach($metodosPago as $metodoPago)
                                    <option value="{{ $metodoPago }}" @if($cita->metodo_pago == $metodoPago) selected @endif>{{ $metodoPago }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-md-12">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection