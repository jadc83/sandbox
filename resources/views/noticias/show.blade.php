<x-app-layout>
    @if ($errors->any())
    <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
        <strong>Se han producido los siguientes errores:</strong>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <table>
        <thead>
            <tr>
                <th>Titular</th>
                <th>Contenido</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>
                        {{$noticia->titulo}}
                    </td>
                    <td> {{$noticia->contenido}}</td>
                </tr>
        </tbody>
    </table>

    <form action="{{route('comentarios.comentar', $noticia)}}" method="post">
        @csrf
        <x-input-label for="contenido" :value="__('Comentar:')" />
        <x-text-input id="contenido" class="block mt-1" type="text" name="contenido" :value="old('contenido')" required autofocus autocomplete="contenido" />
        <x-input-error :messages="$errors->get('contenido')" class="mt-2" />

        <x-primary-button>Comentar</x-primary-button>
    </form>

    @foreach ($noticia->comentarios as $comentario)
        <p>  {{$comentario->user->name}} dijo: {{$comentario->contenido}}</p>
    @endforeach
</x-app-layout>