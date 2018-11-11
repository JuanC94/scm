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
            $table->unsignedInteger('medico_id');
            $table->string('fecha', 50);
            $table->string('hora', 50);
            $table->double('precio');
            $table->enum('metodo_pago', ['Efectivo', 'Tarjeta Debito', 'Tarjeta Crédito'])->default('Efectivo');
            $table->enum('estado_pago', ['Pendiente', 'Pagado', 'Anulado'])->default('Pendiente');
            $table->enum('estado_cita', ['Pendiente', 'Aplicada', 'No asistio', 'Cancelada'])->default('Pendiente');
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
