<x-app-layout>
    <table>
        <thead>
            <tr>
                <th>Meneos</th>
                <th>Titulo</th>
                <th>Contenido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($noticias as $noticia)
                <tr>
                    <td>{{$noticia->meneos->count()}}</td>
                    <td>
                        {{$noticia->titulo}}
                    </td>
                    <td> {{$noticia->contenido}}</td>
                    <td>
                        <form action="{{route('noticias.show', $noticia)}}" method="get">
                            <x-primary-button>Detalles</x-primary-button>
                        </form>
                        <form action="{{route('noticias.destroy', $noticia)}}" method="post">
                            @csrf
                            @method('delete')
                            <x-primary-button>Borrar</x-primary-button>
                        </form>
                        <form action="{{route('noticias.menear', $noticia)}}" method="post">
                            @csrf
                            <x-primary-button>Menear</x-primary-button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{ route('noticias.create')}}" method="get">
        <x-primary-button>Escribir noticia</x-primary-button>
    </form>
</x-app-layout>