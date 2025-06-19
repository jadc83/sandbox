<x-app-layout>

    <form action="{{ route('noticias.store') }}" method="post">
    @csrf
        <div>
            <x-input-label for="titular" :value="__('Titular')" />
            <x-text-input id="titular" class="block mt-1 w-full" type="text" name="titular" :value="old('titular')" required autofocus autocomplete="titular" />
            <x-input-error :messages="$errors->get('titular')" class="mt-2" />

            <x-input-label for="contenido" :value="__('Contenido')" />
            <x-text-input id="contenido" class="block mt-1 w-full" type="text" name="contenido" :value="old('contenido')" required autofocus autocomplete="contenido" />
            <x-input-error :messages="$errors->get('contenido')" class="mt-2" />

            <x-primary-button>Guardar noticia</x-primary-button>
        </div>

    </form>

</x-app-layout>