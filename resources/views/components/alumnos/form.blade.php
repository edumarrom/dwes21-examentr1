@csrf
<div class="mb-6">
    <label for="nombre"
        class="text-sm font-medium text-gray-900 block mb-2 @error('nombre') text-red-500 @enderror">
        Nombre
    </label>
    <input type="text" id="nombre" name="nombre"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nombre') border-red-500 @enderror"
        value = "{{ old('nombre', $alumno->nombre) }}">
    @error('nombre')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<button type="submit"
    class="text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-200
    font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enviar</button>
<button
    class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:ring-gray-200
    font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    <a href="/alumnos">Volver</a>
</button>
