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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // ID de la reserva
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con el usuario
            $table->dateTime('appointment_time'); // Hora de la cita
            $table->text('issue'); // Motivo de la cita (descripción del problema)
            $table->enum('status', ['confirmada', 'rechazada', 'pendiente'])->default('pendiente'); // Columna de estado
            $table->foreignId('specialty_id')->nullable()->constrained('specialties')->onDelete('set null'); // Especialidad asignada por el admin
            $table->timestamps(); // Created at & updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
