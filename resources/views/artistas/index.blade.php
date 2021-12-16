<x-layout>
    <div class="flex flex-col items-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Artistas</h1>
        <div class="border border-gray-200 shadow">
            <table>
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Nombre
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Editar
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Borrar
                        </th>
                    </tr>
                </thead>
                @foreach ($artistas as $artista)
                    <tbody class="bg-white">
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$artista->nombre}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="/artistas/{{ $artista->id }}/edit"
                                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="/artistas/{{ $artista->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('¿Borrar artista?')"
                                        class="px-4 py-1 text-sm text-white bg-red-400 rounded">
                                        Borrar
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>

        <a href="/artistas/create" class=" mt-4 text-white bg-green-400 hover:bg-green-500 focus:ring-4
            focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Insertar nuevo artista
        </a>
    </div>
    {{ $artistas->links() }}
</x-layout>
