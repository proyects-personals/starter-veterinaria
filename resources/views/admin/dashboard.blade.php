<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-4">Lista de Reservas</h3>

                    <table class="min-w-full bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                        <thead>
                            <tr class="border-b border-gray-300 dark:border-gray-600">
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Usuario</th>
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Hora de la Cita</th>
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Motivo</th>
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Estado</th>
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Especialidad</th>
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                                <tr class="border-b border-gray-300 dark:border-gray-600">
                                    <td class="py-3 px-4 text-sm text-gray-900 dark:text-gray-100">{{ $reservation->user->name }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-900 dark:text-gray-100">{{ $reservation->appointment_time->format('d-m-Y H:i') }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-900 dark:text-gray-100">{{ $reservation->issue }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-900 dark:text-gray-100">
                                        <span class="px-2 py-1 text-xs font-semibold {{ $reservation->status === 'confirmada' ? 'bg-green-500' : ($reservation->status === 'pendiente' ? 'bg-yellow-500' : 'bg-red-500') }} text-white rounded-full">
                                            {{ ucfirst($reservation->status) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $reservation->specialty ? $reservation->specialty->name : 'No asignada' }}
                                    </td>
                                    <td class="py-3 px-4 text-sm text-gray-900 dark:text-gray-100">
                                        @if($reservation->status == 'pendiente')
                                            <form action="{{ route('reservations.updateStatus', $reservation->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" name="status" value="confirmada" class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600">Aprobar</button>
                                            </form>
                                            <form action="{{ route('reservations.updateStatus', $reservation->id) }}" method="POST" class="inline ml-2">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" name="status" value="rechazada" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Rechazar</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
