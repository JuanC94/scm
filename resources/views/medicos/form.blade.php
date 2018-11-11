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
                    <form class="form-horizontal" method="POST" action="@if($action == 'create'){{ route('medicoStore') }}@else{{ route('medicoUpdate', ['id' => $medico->id]) }}@endif" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="documento" class="col-lg-2 control-label">Documento*</label>
                            <div class="col-md-6">
                                <input type="text" name="documento" value="{{ $medico->documento }}" class="form-control" placeholder="Documento" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="col-lg-2 control-label">Nombre*</label>
                            <div class="col-md-6">
                                <input type="text" name="nombre" value="{{ $medico->nombre }}" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="genero" class="col-lg-2 control-label">Genero*</label>
                            <div class="col-md-6">
                                <label class="checkbox-inline">
                                    <input type="radio" id="inlineCheckbox1" name="genero" required @if($medico->genero == "M") checked @endif value="M"> Masculino
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="inlineCheckbox2" name="genero" required @if($medico->genero == "F") checked @endif value="F"> Femenino
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento" class="col-lg-2 control-label">Fecha de Nacimiento</label>
                            <div class="col-md-6">
                                <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $medico->fecha_nacimiento }}" required placeholder="Fecha de Nacimiento">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="col-lg-2 control-label">Direccion*</label>
                            <div class="col-md-6">
                                <input type="text" name="direccion" value="{{ $medico->direccion }}" class="form-control" required placeholder="Direccion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-2 control-label">Email*</label>
                            <div class="col-md-6">
                                <input type="text" name="email" value="{{ $medico->email }}" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telefono" class="col-lg-2 control-label">Telefono</label>
                            <div class="col-md-6">
                                <input type="text" name="telefono" value="{{ $medico->telefono }}" class="form-control" placeholder="Teléfono">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="especialidad" class="col-lg-2 control-label">Especialidad</label>
                            <div class="col-md-6">
                                <select name="especialidad" class="form-control" required>
                                    <option value>Seleccione</option>
                                    @foreach($especialidades as $especialidad)
                                        <option value="{{ $especialidad }}" @if($especialidad == $medico->especialidad) selected @endif>{{ $especialidad }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="hidden" name="id" value="{{ $medico->id }}">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                                <a href="{{ route('medicoIndex') }}" class="btn btn-default">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection