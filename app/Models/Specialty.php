<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Nombre de la especialidad
    ];

    // Relación con Reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
