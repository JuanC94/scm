<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PacienteController extends Controller
{
    protected $pacientes;

    public function __construct(Paciente $paciente)
    {
        $this->middleware('auth');
        $this->pacientes = $paciente;
    }

    public function index()
    {
        $pacientes = $this->pacientes;
        $pacientes = $pacientes::all();

        $data = ['title' => 'Pacientes', 'pacientes' => $pacientes];

        return view('pacientes.index', $data);
    }

    public function create()
    {
        $paciente = $this->pacientes;

        $data = ['title' => 'Crear Paciente', 'paciente' => $paciente, 'action' => 'create'];
        return view('pacientes.form', $data);
    }

    public function store(Request $request)
    {
        $paciente = new $this->pacientes;
        $paciente->documento = $request->input('documento');
        $paciente->nombre = $request->input('nombre');
        $paciente->genero = $request->input('genero');
        $paciente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $paciente->email = $request->input('email');
        $paciente->direccion = $request->input('direccion');
        $paciente->telefono = $request->input('telefono');
        $paciente->medicamentos = $request->input('medicamentos');
        $paciente->save();
        return Redirect::route('pacienteIndex')->with('success', true)->with('message', 'Paciente creado con exito.');
    }

    public function edit($id)
    {
        $paciente = $this->pacientes;
        $paciente = $paciente::find($id);

        $data = ['title' => 'Crear Paciente', 'paciente' => $paciente, 'action' => 'update'];
        return view('pacientes.form', $data);
    }

    public function update($id, Request $request)
    {
        $paciente = $this->pacientes;
        $paciente =$paciente::find($id);
        $paciente->documento = $request->input('documento');
        $paciente->nombre = $request->input('nombre');
        $paciente->genero = $request->input('genero');
        $paciente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $paciente->email = $request->input('email');
        $paciente->direccion = $request->input('direccion');
        $paciente->telefono = $request->input('telefono');
        $paciente->medicamentos = $request->input('medicamentos');
        $paciente->save();
        return Redirect::route('pacienteIndex')->with('success', true)->with('message', 'Paciente actualizado con exito.');

    }

    public function delete($id)
    {
        $paciente = $this->pacientes;
        $paciente = $paciente::find($id);
        $paciente->delete();
        return Redirect::route('pacienteIndex')->with('success', true)->with('message', 'Paciente eliminado con exito.');
    }
}
