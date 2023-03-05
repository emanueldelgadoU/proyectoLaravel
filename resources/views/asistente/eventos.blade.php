@extends('asistente.layautAsistente')
@section('main')

    <div class="w-10/12 bg-gray-900 mx-auto rounded-3xl mt-5">
        <img class="rounded-3xl" src="storage/monky.jpg" alt="">
    </div>


    <div class="flex justify-center space-x-4">


        <form method="POST" action='/evento/buscarFecha' enctype="multipart/form-data">
            @csrf
            <input type="date" placeholder="buscarFecha" name="buscarFecha"
                class="w-48 px-4 py-2 border border-gray-400 rounded-lg">
            <x-primary-button class="ml-4">
                {{ __('Buscar Fecha') }}
            </x-primary-button>
        </form>

        <form method="POST" action='/evento/buscarCiudad' enctype="multipart/form-data">
            @csrf
            <input type="text" placeholder="Ciudad" name="buscarCiudad"
                class="w-48 px-4 py-2 border border-gray-400 rounded-lg">
            <x-primary-button class="ml-4">
                {{ __('Buscar Ciudad') }}
            </x-primary-button>
        </form>

        <form method="POST" action='/evento/buscarCategoria' enctype="multipart/form-data">
            @csrf
            <input type="text" placeholder="Categoria" name="buscarCategoria"
                class="w-48 px-4 py-2 border border-gray-400 rounded-lg">
            <x-primary-button class="ml-4">
                {{ __('Buscar Categoria') }}
            </x-primary-button>
        </form>
    </div>


    </form>
    <div class="overflow-y-auto">
        <div class="grid grid-cols-2 gap-4">
            @foreach ($eventos as $evento)
                <div class="flex justify-center items-end text-center ">
                    <div class="bg-gray-500 transition-opacity bg-opacity-75"></div>
                    <span class="hidden sm:inline-block">​</span>
                    <div class="inline-block text-left bg-gray-900 rounded-lg overflow-hidden align-bottom transition-all transform
                                        shadow-2xl sm:my-2 sm:align-middle sm:max-w-xl sm:w-full">
                        <div class="items-center w-full mr-auto ml-auto relative max-w-7xl md:px-6 lg:px-10">
                            <div class="grid grid-cols-1">
                                <div class="mt-4 mr-auto mb-4 ml-auto bg-gray-900 max-w-lg">
                                    <div class="flex flex-col items-center pt-6 pr-6 pb-6 pl-6">
                                        <img src=" {{ $evento->img }}"
                                            class="flex-shrink-0 object-cover object-center btn- flex w-16 h-16 mr-auto -mb-8 ml-auto rounded-full shadow-xl">
                                        <p
                                            class="mt-8 text-2xl font-semibold leading-none text-white tracking-tighter lg:text-3xl">
                                            {{ $evento->nombre }}</p>
                                        <p
                                            class="mt-8 text-xl font-semibold leading-none text-white tracking-tighter lg:text-3xl">
                                            @foreach ($categorias as $categoria)
                                                @if ($categoria->id == $evento->categoria_id)
                                                    {{ $categoria->nombre }}
                                                @endif
                                            @endforeach
                                        </p>
                                        <p class="mt-3 text-base leading-relaxed text-center text-gray-200">
                                            {{ $evento->descripcion }}</p>
                                        <div class="w-full mt-6">
                                            <a href="/evento/{{ $evento->id }}/detalleA"
                                                class="flex text-center items-center justify-center w-full pt-4 pr-10 pb-4 pl-10 text-base
                                                font-medium text-white bg-indigo-600 rounded-xl transition duration-500 ease-in-out transform
                                                hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Detalle</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    </div>
@endsection
