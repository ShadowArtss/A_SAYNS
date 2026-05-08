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
        Schema::create('deudors', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->string('celular');
            $table->string('telefono_fijo');
            $table->foreignId('direccion_id')->constrained('direccions');
            $table->string('email');
            $table->string('estatus');
            $table->string('curp');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deudors');
    }
};
