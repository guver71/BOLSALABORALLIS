<!-- resources/views/usuario/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                <!-- Botones de acción principales -->
                <div class="mb-6 flex space-x-4">
                    <!-- Botón para crear nuevo usuario -->
                    <a href="{{ route('usuarios.create') }}" class="bg-[#A50044] text-white py-2 px-4 rounded hover:bg-[#92003b] focus:outline-none focus:ring focus:ring-[#A50044]">
                        + Nuevo Usuario
                    </a>

                    <!-- Botón para ver usuarios pendientes -->
                    <a href="{{ route('usuarios.pending') }}" class="bg-[#FFCB00] text-black py-2 px-4 rounded hover:bg-[#e5b800] focus:outline-none focus:ring focus:ring-[#FFCB00]">
                        Usuarios Pendientes ({{ $pendingUsersCount }})
                    </a>
                </div>

                <!-- Lista de usuarios -->
                <ul class="divide-y divide-gray-200">
                    @foreach($users as $user)
                        <li class="py-4 flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                
                                <!-- Información del usuario -->
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">{{ $user->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $user->email }} | {{ $user->rol }}</p>
                                </div>
                            </div>

                            <!-- Botones de acción -->
                            <div class="flex space-x-2">
                                <!-- Botón para editar -->
                                <a href="{{ route('usuarios.edit', $user->id) }}" class="text-[#004D98] hover:text-[#003b78] focus:outline-none focus:ring focus:ring-[#004D98]">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Botón para eliminar -->
                                <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600 focus:outline-none focus:ring focus:ring-red-300" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <!-- Paginación -->
                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                if (!confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
