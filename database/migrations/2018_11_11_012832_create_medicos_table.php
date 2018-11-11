<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('documento');
            $table->string('nombre');
            $table->enum('genero', ['M', 'F']);
            $table->date('fecha_nacimiento');
            $table->string('email');
            $table->string('direccion');
            $table->string('telefono');
            $table->enum('especialidad', ['Pediatra', 'Ortopedista', 'Ginecologo', 'Cardiologo', 'Cirujano', 'Neurologo', 'Oftalmologo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
