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
                    <h3 class="text-2xl font-semibold mb-6">Mis Reservas</h3>

                    @if ($reservations->isEmpty())
                        <p class="text-gray-500">No tienes reservas.</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            @foreach ($reservations as $reservation)
                                <div class="bg-white p-4 border rounded-lg shadow-md">
                                    <h4 class="text-xl font-semibold mb-2">Reserva para {{ $reservation->specialty->name }}</h4>
                                    <p><strong>Fecha:</strong> {{ $reservation->appointment_time }}</p>
                                    <p><strong>Motivo</strong> {{ $reservation->issue }}</p>
                                    <p><strong>Estado:</strong> {{ ucfirst($reservation->status) }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
