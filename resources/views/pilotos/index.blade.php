<x-app-layout>

        @foreach ($pilotos as $piloto)
            <p>
                <a href="{{route('pilotos.show', $piloto )}}">
                    {{$piloto->nombre}}
                </a>
            </p>
        @endforeach

    <form action="{{route('pilotos.create')}}" method="get">
        <x-primary-button>Crear nuevo piloto</x-primary-button>
    </form>
</x-app-layout>