<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Agrega esta línea


class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('reservations')->insert([
            [
                'user_id' => 1, // ID de usuario
                'appointment_time' => Carbon::now()->addDays(2), // Cita dentro de 2 días
                'issue' => 'Examen físico general', // Motivo de la cita
                'status' => 'pendiente', // Estado de la cita
                'specialty_id' => 1, // Especialidad Medicina general
            ],
            [
                'user_id' => 2,
                'appointment_time' => Carbon::now()->addDays(5), // Cita dentro de 5 días
                'issue' => 'Cirugía ortopédica', // Motivo de la cita
                'status' => 'pendiente',
                'specialty_id' => 2, // Especialidad Cirugía
            ],
            [
                'user_id' => 1,
                'appointment_time' => Carbon::now()->addDays(3), // Cita dentro de 3 días
                'issue' => 'Chequeo de corazón', // Motivo de la cita
                'status' => 'pendiente',
                'specialty_id' => 3, // Especialidad Cardiología
            ],
            [
                'user_id' => 2,
                'appointment_time' => Carbon::now()->addDays(1), // Cita dentro de 1 día
                'issue' => 'Revisión dental', // Motivo de la cita
                'status' => 'pendiente',
                'specialty_id' => 4, // Especialidad Odontología veterinaria
            ],
        ]);
    }
}
