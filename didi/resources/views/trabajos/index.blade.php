<!-- resources/views/trabajos/index.blade.php -->
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold mb-6">Lista de Trabajos</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Botón Crear Trabajo -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('trabajos.create') }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded shadow hover:bg-blue-700 transition duration-300">
                + Crear Trabajo
            </a>
        </div>

        <!-- Tabla de Trabajos -->
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Título</th>
                    <th class="py-3 px-6 text-left">Descripción</th>
                    <th class="py-3 px-6 text-left">Salario</th>
                    <th class="py-3 px-6 text-left">Ubicación</th>
                    <th class="py-3 px-6 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($trabajos as $trabajo)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $trabajo->titulo }}</td>
                        <td class="py-3 px-6">{{ Str::limit($trabajo->descripcion, 50) }}</td>
                        <td class="py-3 px-6">{{ $trabajo->salario }}</td>
                        <td class="py-3 px-6">{{ $trabajo->ubicacion }}</td>
                        <td class="py-3 px-6 text-center flex justify-center space-x-2">
                            <!-- Botón Ver -->
                            <a href="{{ route('trabajos.show', $trabajo->id) }}" class="bg-indigo-500 text-white py-2 px-4 rounded-full shadow hover:bg-indigo-600 transition duration-300">
                                Ver
                            </a>

                            <!-- Botón Editar -->
                            <a href="{{ route('trabajos.edit', $trabajo->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-full shadow hover:bg-yellow-600 transition duration-300">
                                Editar
                            </a>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('trabajos.destroy', $trabajo->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-full shadow hover:bg-red-600 transition duration-300" onclick="return confirm('¿Estás seguro de que deseas eliminar este trabajo?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
