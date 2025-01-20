




<!-- resources/views/user/my-reservations.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Reservas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-6">
                    <h3 class="text-2xl font-semibold mb-6">Crear Reservas</h3>

                    <form action="{{ route('user.create.reservation') }}" method="POST">
    @csrf

    <input type="hidden" name="specialty_id" value="{{ $specialty->id }}">

    <div class="mb-4">
        <label for="reservation_date" class="block text-sm font-medium text-gray-700">Fecha de la cita</label>
        <input type="date" name="reservation_date" id="reservation_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
    </div>

    <div class="mb-4">
        <label for="reservation_time" class="block text-sm font-medium text-gray-700">Hora de la cita</label>
        <input type="time" name="reservation_time" id="reservation_time" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
    </div>

    <div class="mb-4">
        <label for="issue" class="block text-sm font-medium text-gray-700">Motivo de la cita</label>
        <textarea name="issue" id="issue" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Describe el motivo de tu cita" required></textarea>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">Crear Reserva</button>
</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
