<x-guest-layout>
    <form method="POST" action='/evento/inscribir' enctype="multipart/form-data">
        @csrf

        <!-- user_id -->
        <input type="hidden" name="user_id" value={{Auth::user()->id}}>

        <!-- evento -->
        <input type="hidden" name="evento_id" value={{$evento->id}}>
        <input type="hidden" name="nombre" value={{$evento->nombre}}>
        <input type="hidden" name="img" value={{$evento->img}}>
        <input type="hidden" name="direccion" value={{$evento->direccion}}>
        <input type="hidden" name="descripcion" value={{$evento->descripcion}}>
        <input type="hidden" name="ciudad" value={{$evento->ciudad}}>
        <input type="hidden" name="tipo" value={{$evento->tipo}}>
        <input type="hidden" name="aforomax" value={{$evento->aforomax}}>
        <input type="hidden" name="fecha" value={{$evento->fecha}}>


        <!-- estado -->
        <input type="hidden" name="estado" value="recibida">

        <!-- numEntradas -->
        <div>
            <x-input-label for="numEntradas" :value="__('numEntradas')" />
            <x-text-input id="numEntradas" class="block mt-1 w-full" type="text" name="numEntradas" :value="old('numEntradas')"
             required autofocus autocomplete="numEntradas" />
            <x-input-error :messages="$errors->get('numEntradas')" class="mt-2" />
        </div>

        <x-primary-button class="ml-4">
            {{ __('Enviar') }}
        </x-primary-button>




        </div>
    </form>
</x-guest-layout>
