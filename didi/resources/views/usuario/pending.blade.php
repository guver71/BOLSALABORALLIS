<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios Pendientes de Aprobación') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                <!-- Lista de usuarios pendientes -->
                <ul class="divide-y divide-gray-200">
                    @foreach($users as $user)
                        <li class="py-4 flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <!-- Información del usuario -->
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">{{ $user->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $user->email }} | {{ ucfirst($user->rol) }}</p>
                                </div>
                            </div>

                            <!-- Botón para aprobar usuario -->
                            <div class="flex space-x-2">
                                <form action="{{ route('usuarios.approve', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-[#004D98] hover:bg-[#003b78] text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-[#004D98]">
                                        Aprobar
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <!-- Enlaces de paginación -->
                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
