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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pagare_id')->constrained('pagares');
            $table->foreignId('usuario_id')->constrained('users');
            $table->double('monto_pago');
            $table->date('fecha_pago');
            $table->string('metodo_pago');
            $table->string('referencia_transaccion');
            $table->string('estatus');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
