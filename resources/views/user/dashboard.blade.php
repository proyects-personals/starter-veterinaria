<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-6">Bienvenido a tu Dashboard</h1>

    <h2 class="text-xl font-semibold mb-4">Especialidades Disponibles</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($specialties as $specialty)
            <div class="bg-white p-4 border rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-2">{{ $specialty->name }}</h3>
                <p class="mb-4">{{ $specialty->description }}</p>
                <a href="{{ route('user.specialty.details', $specialty->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 inline-block hover:bg-blue-600">Ver detalles</a>
            </div>
        @endforeach
    </div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
