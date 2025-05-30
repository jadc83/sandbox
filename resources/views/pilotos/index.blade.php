<x-app-layout>
    @if (@empty($pilotos))
        @foreach ($pilotos as $piloto)
            <p>
                {{$piloto->nombre}}
            </p>
        @endforeach
    @else
        <p>No hay pilotos</p>
    @endif

    <form action="{{route('pilotos.create')}}" method="get">
        <x-primary-button>Crear nuevo piloto</x-primary-button>
    </form>
</x-app-layout>