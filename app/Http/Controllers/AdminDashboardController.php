<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Reservation;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin'); // Asegura que solo los admins puedan acceder
    }

    public function index()
    {
        // Obtener todas las reservas con la relación a specialty y user
        $reservations = Reservation::with(['specialty', 'user'])->get();

        return view('admin.dashboard', compact('reservations'));
    }
}
