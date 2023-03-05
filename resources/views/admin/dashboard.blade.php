<x-app-layout>
    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- component -->
                    <div class="block w-full overflow-x-auto">

                        {{-- EVENTO NUEVO --}}
                        <a class="bg-red hover:bg-white text-blue font-bold py-6 mb-8 px-4 rounded-full"
                        href="/evento/nuevo">NUEVO EVENTO</a>

                        {{-- BUSCAR POR FECHA --}}
                        <form method="POST" action='/evento/buscarFecha' enctype="multipart/form-data">
                            @csrf

                            <x-input-label for="buscarFecha" :value="__('buscarFecha')" />
                            <x-text-input id="buscarFecha" class="block mt-1 w-full" type="date" name="buscarFecha" :value="old('numEntradas')"
                            required autofocus autocomplete="buscarFecha" />

                            <x-primary-button class="ml-4">
                                {{ __('Buscar Fecha') }}
                            </x-primary-button>

                        </form>

                        {{-- BUSCAR POR CIUDAD --}}
                        <form method="POST" action='/evento/buscarCiudad' enctype="multipart/form-data">
                            @csrf

                            <x-input-label for="buscarCiudad" :value="__('buscarCiudad')" />
                            <x-text-input id="buscarCiudad" class="block mt-1 w-full" type="text" name="buscarCiudad" :value="old('buscarCiudad')"
                            required autofocus autocomplete="buscarCiudad" />

                            <x-primary-button class="ml-4">
                                {{ __('Buscar Ciudad') }}
                            </x-primary-button>


                        </form>

                        {{-- BUSCAR POR CATEGORIA --}}
                        <form method="POST" action='/evento/buscarCategoria' enctype="multipart/form-data">
                            @csrf


                            <x-input-label for="buscarCategoria" :value="__('buscarCategoria')" />
                            <x-text-input id="buscarCategoria" class="block mt-1 w-full" type="text" name="buscarCategoria" :value="old('buscarCategoria')"
                            required autofocus autocomplete="buscarCategoria" />

                            <x-primary-button class="ml-4">
                                {{ __('Buscar Categoria') }}
                            </x-primary-button>

                        </form>




                        <table class="items-center bg-transparent w-full border-collapse ">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Nombre
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Fecha
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Descripcion
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Ciudad
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Aforo
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Numero de Entradas
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Tipo
                                    </th>

                                    <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Categoria
                                    </th>

                                    <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    modificar
                                    </th>

                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        DETALLE
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        BORRAR
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($eventos as $evento)
                                <form method="POST" action='/evento/{{ $evento->id }}/modificar' enctype="multipart/form-data">
                                    @csrf
                                    <tr>
                                        <th>
                                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{$evento->nombre}}"/>
                                        </th>

                                        <td>
                                            <x-text-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" value="{{$evento->fecha}}"/>
                                        </td>

                                        <td>
                                            <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" value="{{$evento->descripcion}}"/>
                                        </td>

                                        <td>
                                            <x-text-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" value="{{$evento->ciudad}}"/>
                                        </td>

                                        <td>
                                            <x-text-input id="aforomax" class="block mt-1 w-full" type="number" name="aforomax" value="{{$evento->aforomax}}"/>
                                        </td>

                                        <td>
                                            <x-text-input id="numMaxEntradas" class="block mt-1 w-full" type="number" name="numMaxEntradas" value="{{$evento->numMaxEntradas}}"/>
                                        </td>

                                        <td>
                                            <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                            name="tipo">
                                                <option value="{{$evento->tipo}}"selected>{{$evento->tipo}}</option>
                                                <option value="online">online</option>
                                                <option value="presencial">presencial</option>
                                            </select>
                                        </td>

                                        <td>
                                            <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                            name="categoria_id">
                                                @foreach($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}"> {{ $categoria->nombre }} </option>
                                                        @if ($evento->categoria_id == $categoria->id)
                                                            <option value="{{$evento->categoria_id}}" selected> {{ $categoria->nombre }}</option>
                                                        @endif
                                                @endforeach
                                            </select>
                                        </td>



                                        <td>
                                            <x-primary-button class="ml-4">
                                                {{ __('MODIFICAR') }}
                                            </x-primary-button>
                                </form>
                                        </td>

                                        <td>
                                            <a class="bg-red hover:bg-red text-blue font-bold py-2 px-4 rounded-full"
                                             href="/evento/{{ $evento->id }}/detalle">DETALLE</a>
                                        </td>

                                        <td>
                                            @if (Auth::user()->rol=="admin")
                                                <a class="bg-red hover:bg-red text-blue font-bold py-2 px-4 rounded-full"
                                                href="/evento/{{ $evento->id }}/borrar">BORRAR</a>
                                            @endif

                                            @if (Auth::user()->rol=="creador")
                                                @if ($evento->user_id==Auth::user()->id)
                                                    <a class="bg-red hover:bg-red text-blue font-bold py-2 px-4 rounded-full"
                                                    href="/evento/{{ $evento->id }}/borrar">BORRAR</a>
                                                @endif
                                            @endif
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
