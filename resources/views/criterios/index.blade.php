<x-layout>
    <x-criterios.search/>
    <div class="flex flex-col items-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Criterios</h1>
        <div class="border border-gray-200 shadow">
            <table>
                <thead class="bg-gray-50">
                    <tr>
                        @php
                            $link = e("ce=" . old('ce') . "&descripcion=" . old('descripcion'));
                        @endphp

                        <th class="px-6 py-2 text-xs text-gray-500">
                            <a href="/alumnos?orden=ce&{!! $link !!}">
                                Criterio
                            </a>
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            <a href="/alumnos?orden=descripcion&{!! $link !!}">
                                Descripción
                            </a>
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Editar
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Borrar
                        </th>
                    </tr>
                </thead>
                @foreach ($criterios as $cri)
                    <tbody class="bg-white">
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$cri->nombre}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$cri->nota_final}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="/criterios/{{ $cri->id }}/edit"
                                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="/criterios/{{ $cri->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('¿Borrar alumno?')"
                                        class="px-4 py-1 text-sm text-white bg-red-400 rounded">
                                        Borrar
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>

        <a href="/criterios/create" class=" mt-4 text-white bg-green-400 hover:bg-green-500 focus:ring-4
            focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Insertar nuevo alumno
        </a>
    </div>
    {{ $criterios->links() }}
</x-layout>
