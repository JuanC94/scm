<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asunto');
            $table->text('enfermedades')->nullable();
            $table->text('sintomas')->nullable();
            $table->text('medicamentos')->nullable();
            $table->unsignedInteger('paciente_id');
            $table->foreign('paciente_id')->reference('id')->on('pacientes');
            $table->unsignedInteger('medico_id');
            $table->foreign('medico_id')->reference('id')->on('medicos');
            $table->string('fecha', 50);
            $table->string('hora', 50);
            $table->double('precio');
            $table->enum('metodo_pago', ['Efectivo', 'Datafono']);
            $table->tinyInteger('estado')->default(1);
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
        Schema::dropIfExists('citas');
    }
}
