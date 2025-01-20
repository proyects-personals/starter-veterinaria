<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminReservation;
use App\Http\Controllers\AdminSpecialtyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

## rutas para el usuario
Route::middleware(['auth', 'role:user'])->group(function () {
    // Dashboard
    Route::get('/user/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');
    
    // Detalles de la especialidad
    Route::get('/specialty/{id}', [UserDashboardController::class, 'specialtyDetails'])->name('user.specialty.details');
    
    // Crear una reserva
    Route::post('/reservation/create', [UserDashboardController::class, 'createReservation'])->name('user.create.reservation');
    
    // Ver reservas
    Route::get('/reservations', [UserDashboardController::class, 'myReservations'])->name('user.reservations');
});


    
##rutas para el administrador

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware(['auth', 'verified', 'role:admin']);

# admin

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/specialties', [AdminSpecialtyController::class, 'specialties'])->name('admin.specialties');
    Route::get('/create-specialty', [AdminSpecialtyController::class, 'create'])->name('admin.create-specialty');
    Route::post('/store-specialty', [AdminSpecialtyController::class, 'store'])->name('admin.store-specialty');
    Route::get('/edit-specialty/{id}', [AdminSpecialtyController::class, 'edit'])->name('admin.edit-specialty');
    Route::put('/update-specialty/{id}', [AdminSpecialtyController::class, 'update'])->name('admin.update-specialty');
    Route::delete('/delete-specialty/{id}', [AdminSpecialtyController::class, 'destroy'])->name('admin.delete-specialty');
    Route::patch('/reservations/{reservation}/status', [AdminReservation::class, 'updateStatus'])->name('reservations.updateStatus');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
