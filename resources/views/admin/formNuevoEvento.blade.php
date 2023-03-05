<x-guest-layout>
    <form method="POST" action='/evento/store' enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"
             required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- fecha -->
        <div>
            <x-input-label for="fecha" :value="__('fecha')" />
            <x-text-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')"
             required autofocus autocomplete="fecha" />
            <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
        </div>

     <!-- ciudad -->
     <div>
        <x-input-label for="ciudad" :value="__('ciudad')" />
        <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="ciudad" :value="old('ciudad')"
         required autofocus autocomplete="ciudad" />
        <x-input-error :messages="$errors->get('ciudad')" class="mt-2" />
    </div>

        <!-- descripcion -->
        <div>
            <x-input-label for="descripcion" :value="__('descripcion')" />
            <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')"
             required autofocus autocomplete="descripcion" />
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <!-- Direccion -->
        <div>
            <x-input-label for="direccion" :value="__('Direccion')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')"
             required autofocus autocomplete="direccion" />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- aforomax -->
        <div>
            <x-input-label for="aforomax" :value="__('aforomax')" />
            <x-text-input id="aforomax" class="block mt-1 w-full" type="text" name="aforomax" :value="old('aforomax')"
             required autofocus autocomplete="aforomax" />
            <x-input-error :messages="$errors->get('aforomax')" class="mt-2" />
        </div>


        <!-- tipo -->
        <div>
            <x-input-label for="tipo" :value="__('tipo')" />
            <select
            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
            name="tipo">
            <option value="online">online</option>
            <option value="presencial">presencial</option>
        </select>
            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
        </div>


        <!-- numMaxEntradas Address -->
        <div class="mt-4">
            <x-input-label for="numMaxEntradas" :value="__('numMaxEntradas')" />
            <x-text-input id="numMaxEntradas" class="block mt-1 w-full" type="number" name="numMaxEntradas" :value="old('numMAxEntradas')"
             required autocomplete="username" />
            <x-input-error :messages="$errors->get('numMaxEntradas')" class="mt-2" />
        </div>


        <!-- categoria_id -->

        <select class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-800 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="categoria_id"  name="categoria_id" type="text" placeholder="" required>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
        </select>

        <!-- img -->

        <div class="mt-4">
            <x-input-label for="img" :value="__('img')" />
            <x-text-input id="img" class="block mt-1 w-full" type="file" name="img" :value="old('img')"
             required autocomplete="username" />
            <x-input-error :messages="$errors->get('img')" class="mt-2" />
        </div>

        <!-- user_id -->
        <input type="hidden" name="user_id" value={{Auth::user()->id}}>



        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>


        </div>
    </form>
</x-guest-layout>
