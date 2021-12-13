<x-layout>
    <x-alumnos.search/>
    <div class="flex flex-col items-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Alumnos</h1>
        <div class="border border-gray-200 shadow">
            <table>
                <thead class="bg-gray-50">
                    <tr>
                        @php
                            $link = e("nombre=" . old('nombre') . "&nota_final=" . old('nota_final'));
                        @endphp

                        <th class="px-6 py-2 text-xs text-gray-500">
                            <a href="/alumnos?orden=nombre&{!! $link !!}">
                                Nombre
                            </a>
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            <a href="/alumnos?orden=nota_final&{!! $link !!}">
                                Nota Final
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
                @foreach ($alumnos as $a)
                    <tbody class="bg-white">
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$a->nombre}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$a->nota_final}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="/alumnos/{{ $a->id }}/edit"
                                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="/alumnos/{{ $a->id }}" method="POST">
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

        <a href="/alumnos/create" class=" mt-4 text-white bg-green-400 hover:bg-green-500 focus:ring-4
            focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Insertar nuevo alumno
        </a>
    </div>
    {{ $alumnos->links() }}
</x-layout>
