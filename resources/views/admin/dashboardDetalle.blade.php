<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- component -->
                    <div class="block w-full overflow-x-auto">
                        {{-- APUNTARME EVENTO --}}
                        {{-- APUNTARME EVENTO --}}
                        <a class="bg-red hover:bg-white text-blue font-bold py-6 mb-8 px-4 rounded-full"
                        href="/evento/{{$eventos->id}}/user/{{Auth::user()->id}}/incribirme">APUNTARME AL EVENTO</a>
                        {{-- APUNTARME EVENTO --}}
                        {{-- APUNTARME EVENTO --}}
                        <table class="items-center bg-transparent w-full border-collapse ">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        DNI
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        NOMBRE
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        APELLIDO
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        EDAD
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        EMAIL
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        DIRECCION
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        CIUDAD
                                    </th>
                                    <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        TELEFONO
                                    </th>

                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        BORRAR
                                    </th>



                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($participantes as $user)
                                    <tr>
                                        <th
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                            {{ $user->dni }}
                                        </th>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                            {{ $user->nombre }}
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $user->apellido }}
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                            {{ $user->edad }}
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $user->email }}
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                            {{ $user->direccion }}
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $user->ciudad }}
                                        </td>

                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $user->telefono }}
                                        </td>

                                        <td>
                                            @if (Auth::user()->rol=="admin")
                                                <a class="bg-red hover:bg-red text-blue font-bold py-2 px-4 rounded-full"
                                                href="/user/{{ $user->id }}/evento/{{ $eventos->id }}/borrar">BORRAR</a>
                                            @endif

                                        @if (Auth::user()->rol=="creador")
                                            @if ($eventos->user_id==Auth::user()->id)
                                               <a class="bg-red hover:bg-red text-blue font-bold py-2 px-4 rounded-full"
                                                href="/user/{{ $user->id }}/evento/{{ $eventos->id }}/borrar">BORRAR</a>
                                            @endif
                                        @endif

                                            {{-- <a class="bg-red hover:bg-red text-blue font-bold py-2 px-4 rounded-full"
                                            href="/user/{{ $user->id }}/evento/{{ $eventos->id }}/borrar">BORRAR</a> --}}
                                        </td>

                                @endforeach
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
