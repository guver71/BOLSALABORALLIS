<!-- resources/views/trabajos/edit.blade.php -->
<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-6">Editar Trabajo</h1>

            <form action="{{ route('trabajos.update', $trabajo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" name="titulo" id="titulo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('titulo', $trabajo->titulo) }}">
                    @error('titulo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('descripcion', $trabajo->descripcion) }}</textarea>
                    @error('descripcion')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="salario" class="block text-sm font-medium text-gray-700">Salario</label>
                    <input type="text" name="salario" id="salario" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('salario', $trabajo->salario) }}">
                    @error('salario')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="ubicacion" class="block text-sm font-medium text-gray-700">Ubicación</label>
                    <input type="text" name="ubicacion" id="ubicacion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('ubicacion', $trabajo->ubicacion) }}">
                    @error('ubicacion')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('trabajos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-700">Cancelar</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
