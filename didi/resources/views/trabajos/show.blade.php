<!-- resources/views/trabajos/show.blade.php -->
<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-6">{{ $trabajo->titulo }}</h1>

            <p class="mb-4"><strong>Descripción:</strong> {{ $trabajo->descripcion }}</p>
            <p class="mb-4"><strong>Salario:</strong> {{ $trabajo->salario }}</p>
            <p class="mb-4"><strong>Ubicación:</strong> {{ $trabajo->ubicacion }}</p>

            <a href="{{ route('trabajos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Volver a la lista</a>
        </div>
    </div>
</x-app-layout>
