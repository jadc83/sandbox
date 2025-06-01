<x-app-layout>
    <div class="max-w-md mx-auto bg-white shadow-md rounded-md p-6 mt-6">
        <h2 class="text-2xl font-semibold mb-4 text-center">Detalles del Piloto</h2>


            <div class="font-semibold">Nombre:</div>
            <div>{{ $piloto->nombre }}</div>

            <div class="font-semibold">Nacionalidad:</div>
            <div>{{ $piloto->nacionalidad }}</div>

            <div class="font-semibold">Fecha de nacimiento:</div>
            <div>{{ \Carbon\Carbon::parse($piloto->nacimiento)->format('d-m-Y') }}</div>

        @if($piloto->asignable)
            <div class="border-t pt-4">
                <h3 class="text-xl font-semibold mb-3">Estadísticas</h3>
                    <div class="font-medium">Carreras ganadas:</div>
                    <div>{{ $piloto->asignable->ganadas ?? 'N/A' }}</div>
                    <div class="font-medium">Podios conseguidos:</div>
                    <div>{{ $piloto->asignable->podios ?? 'N/A' }}</div>
                    <div class="font-medium">Puntos totales:</div>
                    <div>{{ $piloto->asignable->puntos ?? 'N/A' }}</div>
            </div>
        @else
            <p class="text-gray-500 italic mt-4">No hay estadísticas disponibles para este piloto.</p>
        @endif

        <form action="{{route('pilotos.cambiar', $piloto)}}" method="post">
            @csrf
            <select name="status">
                <option value="" disabled selected>Asignar nuevo puesto</option>
                <option value="titular">Titular</option>
                <option value="reserva">Reserva</option>
                <option value="probador">Probador</option>
            </select>
        </form>
    </div>
</x-app-layout>
