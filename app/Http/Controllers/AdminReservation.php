<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\Reservation;


class AdminReservation extends Controller
{
    use HasFactory;

    // Relación con Specialty
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }


    public function updateStatus(Request $request, Reservation $reservation)
    {
        // Validar el valor del estado
        $request->validate([
            'status' => ['required', 'in:confirmada,rechazada'],
        ]);

        // Actualizar el estado de la reserva
        $reservation->status = $request->status;
        $reservation->save();

        // Redirigir de vuelta a la lista de reservas con un mensaje de éxito
        return redirect()->route('admin.dashboard')->with('success', 'Estado de la reserva actualizado');
    }
}
