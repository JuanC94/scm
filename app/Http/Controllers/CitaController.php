<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Medico;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CitaController extends Controller
{
    protected $cita;

    protected $paciente;

    protected $medico;

    protected $metodosPago;

    protected $estadosPago;

    protected $estadosCita;

    public function __construct(Cita $citas, Paciente $pacientes, Medico $medicos)
    {
        $this->middleware('auth');
        $this->cita = $citas;
        $this->paciente = $pacientes;
        $this->medico = $medicos;

        $this->metodosPago = [
            'Efectivo' => 'Efectivo',
            'Tarjeta Debito' => 'Tarjeta Debito',
            'Tarjeta Crédito' => 'Tarjeta Crédito'];

        $this->estadosPago = [
            'Pendiente' => 'Pendiente',
            'Pagado' => 'Pagado',
            'Anulado' => 'Anulado'];

        $this->estadosCita = [
            'Pendiente' => 'Pendiente',
            'Aplicada' => 'Aplicada',
            'No asistio' => 'No asistio',
            'Cancelada' => 'Cancelada'];
    }

    public function index()
    {
        $citas = $this->cita;
        $citas = $citas::with('paciente', 'medico')->get();

        $data = ['title' => 'Citas', 'citas' => $citas];
        return view('citas.index', $data);
    }

    public function create()
    {
        $cita = $this->cita;
        $pacientes = $this->paciente;
        $pacientes = $pacientes::all();
        $medicos = $this->medico;
        $medicos = $medicos::all();
        $metodosPago = $this->metodosPago;
        $estadosPago = $this->estadosPago;
        $estadosCita = $this->estadosCita;

        $data = ['title' => 'Crear Cita',
            'cita' => $cita,
            'pacientes' => $pacientes,
            'medicos' => $medicos,
            'metodosPago' => $metodosPago,
            'estadosPago' => $estadosPago,
            'estadosCita' => $estadosCita,
            'action' => 'create'
        ];
        return view('citas.form', $data);
    }

    public function store(Request $request)
    {
        $cita = new  $this->cita;
        $cita->asunto = $request->input('asunto');
        $cita->enfermedades = $request->input('enfermedades');
        $cita->sintomas = $request->input('sintomas');
        $cita->medicamentos = $request->input('medicamentos');
        $cita->paciente_id = $request->input('paciente_id');
        $cita->medico_id = $request->input('medico_id');
        $cita->fecha = $request->input('fecha');
        $cita->hora = $request->input('hora');
        $cita->precio = $request->input('precio');
        $cita->metodo_pago = $request->input('metodo_pago');
        $cita->estado_pago = $request->input('estado_pago');
        $cita->estado_cita = $request->input('estado_cita');
        $cita->save();
        return Redirect::route('citaIndex')->with('success', true)->with('message', 'Cita creada con exito.');
    }

    public function edit($id)
    {
        $cita = $this->cita;
        $cita = $cita::find($id);
        $pacientes = $this->paciente;
        $pacientes = $pacientes::all();
        $medicos = $this->medico;
        $medicos = $medicos::all();
        $metodosPago = $this->metodosPago;
        $estadosPago = $this->estadosPago;
        $estadosCita = $this->estadosCita;

        $data = ['title' => 'Actualizar Cita',
            'cita' => $cita,
            'pacientes' => $pacientes,
            'medicos' => $medicos,
            'metodosPago' => $metodosPago,
            'estadosPago' => $estadosPago,
            'estadosCita' => $estadosCita,
            'action' => 'update'
        ];
        return view('citas.form', $data);
    }

    public function update($id, Request $request)
    {
        $cita = $this->cita;
        $cita = $cita::find($id);
        $cita->asunto = $request->input('asunto');
        $cita->enfermedades = $request->input('enfermedades');
        $cita->sintomas = $request->input('sintomas');
        $cita->medicamentos = $request->input('medicamentos');
        $cita->paciente_id = $request->input('paciente_id');
        $cita->medico_id = $request->input('medico_id');
        $cita->fecha = $request->input('fecha');
        $cita->hora = $request->input('hora');
        $cita->precio = $request->input('precio');
        $cita->metodo_pago = $request->input('metodo_pago');
        $cita->estado_pago = $request->input('estado_pago');
        $cita->estado_cita = $request->input('estado_cita');
        $cita->save();
        return Redirect::route('citaIndex')->with('success', true)->with('message', 'Cita actualizada con exito.');
    }

    public function delete($id)
    {
        $cita = $this->cita;
        $cita = $cita->find($id);
        $cita->delete();
        return Redirect::route('citaIndex')->with('success', true)->with('message', 'Cita eliminada con exito.');
    }

    public function view_citas_paciente($paciente_id)
    {
        $citas = $this->cita;
        $citas = $citas::with('paciente', 'medico')
            ->where('paciente_id', $paciente_id)
            ->get();
        $paciente = $this->paciente;
        $paciente = $paciente::find($paciente_id);

        $data = ['title' => 'Citas del Paciente: '. $paciente->documento . ' - '. $paciente->nombre, 'citas' => $citas];
        return view('citas.index', $data);
    }

    public function view_citas_medico($medico_id)
    {
        $citas = $this->cita;
        $citas = $citas::with('paciente', 'medico')
            ->where('medico_id', $medico_id)
            ->get();
        $medico = $this->medico;
        $medico = $medico::find($medico_id);

        $data = ['title' => 'Citas para el Medico: '. $medico->documento . ' - '. $medico->nombre, 'citas' => $citas];
        return view('citas.index', $data);
    }

}
