<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;

class AdminSpecialtyController extends Controller
{
        // Mostrar todas las especialidades
        public function index()
        {
            $specialties = Specialty::all(); // Obtener todas las especialidades
            return view('specialties.index', compact('specialties'));
        }
    
        // Mostrar el formulario para crear una nueva especialidad
        public function create()
        {
            return view('admin.create-specialty');
        }

        public function specialties()
        {
            $specialties = Specialty::all(); // Obtener todas las especialidades
            return view('admin.specialties', compact('specialties'));
        }

    
        // Guardar una nueva especialidad
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255', // Validar el nombre
            ]);
    
            Specialty::create([
                'name' => $request->name, // Guardar la especialidad
            ]);
    
            return redirect()->route('admin.specialties')->with('success', 'Especialidad creada exitosamente');
        }
    
        // Mostrar el formulario para editar una especialidad
        public function edit($id)
        {
            $specialty = Specialty::findOrFail($id);
            return view('admin.edit-specialty', compact('specialty'));
        }
    

        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $specialty = Specialty::findOrFail($id);
            $specialty->update([
                'name' => $request->name,
            ]);

            return redirect()->route('admin.specialties')->with('success', 'Especialidad actualizada exitosamente');
        }

    
        // Eliminar una especialidad
        public function destroy($id)
        {
            $specialty = Specialty::findOrFail($id);
            $specialty->delete();
    
            return redirect()->route('admin.specialties')->with('success', 'Especialidad eliminada exitosamente');
        }
}
