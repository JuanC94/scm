<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [
        'as'   => 'userIndex',
        'uses' => 'UserController@index'
    ]);
});

Route::group(['prefix' => 'pacientes'], function () {
    Route::get('/', [
        'as'   => 'pacienteIndex',
        'uses' => 'PacienteController@index'
    ]);

    Route::get('/create', [
        'as'   => 'pacienteCreate',
        'uses' => 'PacienteController@create'
    ]);

    Route::post('/store', [
        'as'   => 'pacienteStore',
        'uses' => 'PacienteController@store'
    ]);

    Route::get('/{id}/edit', [
        'as'   => 'pacienteEdit',
        'uses' => 'PacienteController@edit'
    ]);

    Route::post('/{id}/update', [
        'as'   => 'pacienteUpdate',
        'uses' => 'PacienteController@update'
    ]);

    Route::get('/{id}/delete', [
        'as'   => 'pacienteDelete',
        'uses' => 'PacienteController@delete'
    ]);
});

Route::group(['prefix' => 'medicos'], function () {
    Route::get('/', [
        'as'   => 'medicoIndex',
        'uses' => 'MedicoController@index'
    ]);

    Route::get('/create', [
        'as'   => 'medicoCreate',
        'uses' => 'MedicoController@create'
    ]);

    Route::post('/store', [
        'as'   => 'medicoStore',
        'uses' => 'MedicoController@store'
    ]);

    Route::get('/{id}/edit', [
        'as'   => 'medicoEdit',
        'uses' => 'MedicoController@edit'
    ]);

    Route::post('/{id}/update', [
        'as'   => 'medicoUpdate',
        'uses' => 'MedicoController@update'
    ]);

    Route::get('/{id}/delete', [
        'as'   => 'medicoDelete',
        'uses' => 'MedicoController@delete'
    ]);
});


Route::group(['prefix' => 'citas'], function () {
    Route::get('/', [
        'as'   => 'citaIndex',
        'uses' => 'CitaController@index'
    ]);

    Route::get('/create', [
        'as'   => 'citaCreate',
        'uses' => 'CitaController@create'
    ]);

    Route::post('/store', [
        'as'   => 'citaStore',
        'uses' => 'CitaController@store'
    ]);

    Route::get('/{id}/edit', [
        'as'   => 'citaEdit',
        'uses' => 'CitaController@edit'
    ]);

    Route::post('/{id}/update', [
        'as'   => 'citaUpdate',
        'uses' => 'CitaController@update'
    ]);

    Route::get('/{id}/delete', [
        'as'   => 'citaDelete',
        'uses' => 'CitaController@delete'
    ]);

    Route::get('/{paciente_id}/citas-paciente', [
        'as'   => 'citaPacienteView',
        'uses' => 'CitaController@view_citas_paciente'
    ]);

    Route::get('/{medico_id}/citas-medico', [
        'as'   => 'citaMedicoView',
        'uses' => 'CitaController@view_citas_medico'
    ]);

});