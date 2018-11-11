<?php

namespace App\Http\Controllers;

use App\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MedicoController extends Controller
{
    protected $medicos;

    private $especialidades;

    public function __construct(Medico $medico)
    {
        $this->middleware('auth');
        $this->medicos = $medico;
        $this->especialidades = [
            'Pediatra' => 'Pediatra',
            'Ortopedista' => 'Ortopedista',
            'Ginecologo' => 'Ginecologo',
            'Cardiologo' => 'Cardiologo',
            'Cirujano' => 'Cirujano',
            'Neurologo' => 'Neurologo',
            'Oftalmologo' => 'Oftalmologo'
        ];
    }

    public function index()
    {
        $medicos = $this->medicos;
        $medicos = $medicos::all();

        $data = ['title' => 'Medicos', 'medicos' => $medicos];

        return view('medicos.index', $data);
    }

    public function create()
    {
        $medico = $this->medicos;
        $especialidades = $this->especialidades;

        $data = ['title' => 'Crear Medico', 'medico' => $medico, 'especialidades' => $especialidades, 'action' => 'create'];
        return view('medicos.form', $data);
    }

    public function store(Request $request)
    {
        $medico = new $this->medicos;
        $medico->documento = $request->input('documento');
        $medico->nombre = $request->input('nombre');
        $medico->genero = $request->input('genero');
        $medico->fecha_nacimiento = $request->input('fecha_nacimiento');
        $medico->email = $request->input('email');
        $medico->direccion = $request->input('direccion');
        $medico->telefono = $request->input('telefono');
        $medico->especialidad = $request->input('especialidad');
        $medico->save();
        return Redirect::route('medicoIndex')->with('success', true)->with('message', 'Medico creado con exito.');
    }

    public function edit($id)
    {
        $medico = $this->medicos;
        $medico = $medico::find($id);
        $especialidades = $this->especialidades;

        $data = ['title' => 'Crear Medico', 'medico' => $medico, 'especialidades' => $especialidades, 'action' => 'update'];
        return view('medicos.form', $data);
    }

    public function update($id, Request $request)
    {
        $medico = $this->medicos;
        $medico =$medico::find($id);
        $medico->documento = $request->input('documento');
        $medico->nombre = $request->input('nombre');
        $medico->genero = $request->input('genero');
        $medico->fecha_nacimiento = $request->input('fecha_nacimiento');
        $medico->email = $request->input('email');
        $medico->direccion = $request->input('direccion');
        $medico->telefono = $request->input('telefono');
        $medico->especialidad = $request->input('especialidad');
        $medico->save();
        return Redirect::route('medicoIndex')->with('success', true)->with('message', 'Medico actualizado con exito.');

    }

    public function delete($id)
    {
        $medico = $this->medicos;
        $medico = $medico::find($id);
        $medico->delete();
        return Redirect::route('medicoIndex')->with('success', true)->with('message', 'Medico eliminado con exito.');
    }
}
