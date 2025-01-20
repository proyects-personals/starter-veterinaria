<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Los campos que se pueden asignar en masa
    protected $fillable = [
        'user_id', // ID del usuario
        'appointment_time', // Fecha y hora de la cita
        'issue', // Descripción del problema
        'status', // Estado de la cita
        'specialty_id', // Especialidad de la cita
    ];

    // Relación con Specialty
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Convertir 'appointment_time' a una instancia de Carbon
    protected $casts = [
        'appointment_time' => 'datetime', // Convierte automáticamente a un objeto Carbon
    ];
}
