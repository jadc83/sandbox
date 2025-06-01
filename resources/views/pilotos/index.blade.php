<x-app-layout>

        @foreach ($pilotos as $piloto)
            <p>
                {{$piloto->nombre}}
            </p>
        @endforeach

    <form action="{{route('pilotos.create')}}" method="get">
        <x-primary-button>Crear nuevo piloto</x-primary-button>
    </form>
</x-app-layout>