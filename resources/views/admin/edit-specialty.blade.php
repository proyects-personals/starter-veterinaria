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
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-6">Editar Especialidad</h1>
        
        <form action="{{ route('admin.update-specialty', $specialty->id) }}" method="POST" class="bg-white p-6 shadow-md rounded-lg border border-gray-300">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre de la Especialidad</label>
                <input type="text" name="name" id="name" class="mt-2 p-2 w-full border border-gray-300 rounded-lg" value="{{ $specialty->name }}" required>
            </div>

            <button type="submit" class="bg-green-500 text-dark px-4 py-2 rounded hover:bg-green-600">Actualizar Especialidad</button>
        </form>
    </div>
            </div>
        </div>
    </div>
</x-app-layout>
