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
        Schema::create('pilotos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("cedula");
            $table->string("nombre");
            $table->double("latitud1");
            $table->double("longitud1");
            $table->string("hora1");
            $table->double("latitud2");
            $table->double("longitud2");
            $table->string("hora2");
            $table->double("latitud3");
            $table->double("longitud3");
            $table->string("hora3");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilotos');
    }
};
