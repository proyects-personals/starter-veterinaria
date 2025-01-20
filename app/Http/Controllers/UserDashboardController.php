<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\Reservation;
use Auth;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user'); // Asegura que solo los usuarios con el rol 'user' puedan acceder
    }

    /**
     * Mostrar el dashboard con la lista de especialidades.
     */
    public function dashboard()
    {
        // Obtener todas las especialidades disponibles
        $specialties = Specialty::all();
        
        // Retornar la vista con las especialidades
        return view('user.dashboard', compact('specialties'));
    }

    /**
     * Mostrar los detalles de una especialidad seleccionada por el usuario.
     */
    public function specialtyDetails($id)
    {
        // Buscar la especialidad por ID
        $specialty = Specialty::findOrFail($id);
        
        // Retornar la vista con los detalles de la especialidad
        return view('user.specialty-details', compact('specialty'));
    }

    /**
     * Crear una reserva para una especialidad.
     */
    public function createReservation(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'specialty_id' => 'required|exists:specialties,id',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required|date_format:H:i',
            'issue' => 'required|string|max:255', // Validar el motivo
        ]);
    
        // Crear la reserva
        Reservation::create([
            'user_id' => Auth::id(),
            'specialty_id' => $request->specialty_id,
            'appointment_time' => $request->reservation_date . ' ' . $request->reservation_time,
            'issue' => $request->issue, // Motivo de la cita
            'status' => 'pendiente',
        ]);
    
        // Redirigir a la lista de reservas con un mensaje de éxito
        return redirect()->route('user.reservations')->with('success', 'Reserva realizada con éxito.');
    }
    

    /**
     * Mostrar las reservas del usuario logueado.
     */
    public function myReservations()
    {
        $reservations = Reservation::with('specialty')->where('user_id', auth()->id())->get();
    
        return view('user.my-reservations', compact('reservations'));
    }
    

    /**
     * Mostrar los detalles de una reserva específica.
     */
    public function reservationDetails($id)
    {
        // Buscar la reserva por ID
        $reservation = Reservation::findOrFail($id);

        // Retornar la vista con los detalles de la reserva
        return view('user.reservation-details', compact('reservation'));
    }
}
