<div class="w-80">
    <form action="/alumnos" method="get">
        <input type="hidden" name="orden" value="{{ request()->query('orden') }}">
        {{-- TODO: Tiene que venir algo más que el orden --}}
        <div class="mb-3">
            <label for="nombre"
                class="text-sm font-medium text-gray-900 block mb-2">
                Nombre
            </label>
            <input type="text" name="nombre" id="nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900
                sm:text-sm rounded-1g focus:ring-blue-500 focus:border-blue-500
                block w-full p-1 px-2" value="{{ request()->query('nombre') }}">
        </div>

        <div class="mb-3">
            <label for="nota_final"
                class="text-sm font-medium text-gray-900 block mb-2">
                Nota Final
            </label>
            <input type="text" name="nota_final" id="nota_final"
                class="bg-gray-50 border border-gray-300 text-gray-900
                sm:text-sm rounded-1g focus:ring-blue-500 focus:border-blue-500
                block w-full p-1 px-2" value="{{ request()->query('nota_final') }}">
        </div>
        <button type="submit"
            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4
            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center">
            Buscar
        </button>
        <a href="/alumnos"
            class="text-white border-gray-500 border-2 bg-gray-500 focus:ring-4
            focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-1 text-center">
            Limpiar
        </a>
    </form>
</div>
