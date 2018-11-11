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
                    <form class="form-horizontal" method="POST" action="@if($action == 'create'){{ route('pacienteStore') }}@else{{ route('pacienteUpdate', ['id' => $paciente->id]) }}@endif" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="documento" class="col-lg-2 control-label">Documento*</label>
                            <div class="col-md-6">
                                <input type="text" name="documento" value="{{ $paciente->documento }}" class="form-control" placeholder="Documento" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="col-lg-2 control-label">Nombre*</label>
                            <div class="col-md-6">
                                <input type="text" name="nombre" value="{{ $paciente->nombre }}" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="genero" class="col-lg-2 control-label">Genero*</label>
                            <div class="col-md-6">
                                <label class="checkbox-inline">
                                    <input type="radio" id="inlineCheckbox1" name="genero" required @if($paciente->genero == "M") checked @endif value="M"> Masculino
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="inlineCheckbox2" name="genero" required @if($paciente->genero == "F") checked @endif value="F"> Femenino
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento" class="col-lg-2 control-label">Fecha de Nacimiento</label>
                            <div class="col-md-6">
                                <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $paciente->fecha_nacimiento }}" required placeholder="Fecha de Nacimiento">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="col-lg-2 control-label">Direccion*</label>
                            <div class="col-md-6">
                                <input type="text" name="direccion" value="{{ $paciente->direccion }}" class="form-control" required placeholder="Direccion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-2 control-label">Email*</label>
                            <div class="col-md-6">
                                <input type="text" name="email" value="{{ $paciente->email }}" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telefono" class="col-lg-2 control-label">Telefono</label>
                            <div class="col-md-6">
                                <input type="text" name="telefono" value="{{ $paciente->telefono }}" class="form-control" placeholder="Teléfono">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="medicamentos" class="col-lg-2 control-label">Medicamentos</label>
                            <div class="col-md-6">
                                <textarea name="medicamentos" class="form-control" placeholder="Medicamentos">{{ $paciente->medicamentos }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="hidden" name="id" value="{{ $paciente->id }}">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                                <a href="{{ route('pacienteIndex') }}" class="btn btn-default">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection