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

<h1 class="text-2xl font-semibold mb-6">Lista de Especialidades</h1>

<a href="{{ route('admin.create-specialty') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Crear Nueva Especialidad</a>

<ul class="list-none">
    @foreach ($specialties as $specialty)
        <li class="border-b border-gray-200 py-2">
            <span class="text-gray-700">{{ $specialty->name }}</span>

            <a href="{{ route('admin.edit-specialty', $specialty->id) }}" class="text-yellow-500 hover:text-yellow-600 ml-4">Editar</a> |
            
            <form action="{{ route('admin.delete-specialty', $specialty->id) }}" method="POST" class="inline ml-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-600">Eliminar</button>
            </form>
        </li>
    @endforeach
</ul>

</div>
            </div>
        </div>
    </div>
</x-app-layout>
