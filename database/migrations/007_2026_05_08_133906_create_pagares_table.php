<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expediente_id')->constrained('expedientes');
            $table->foreignId('seguimiento_id')->constrained('seguimientos');
            $table->foreignId('aseguradora_id')->constrained('aseguradoras');
            $table->foreignId('deudor_id')->constrained('deudors');
            $table->double('monto_original');
            $table->double('saldo');
            $table->date('fecha_registro');
            $table->date('fecha_prestamo');
            $table->string('estatus');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagares');
    }
};
