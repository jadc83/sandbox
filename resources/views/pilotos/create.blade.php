<x-app-layout>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div x-data="{ status: '{{ old('status') }}' }" class="p-6 bg-white shadow-md rounded-lg text-center">

        <form action="{{route('pilotos.store')}}" method="post">
            @csrf
            <select name="status" x-model="status">
                <option value="" disabled {{ old('status') ? '' : 'selected' }}>-- Elige un estado --</option>
                <option value="titular" {{ old('status') === 'titular' ? 'selected' : '' }}>Titular</option>
                <option value="reserva" {{ old('status') === 'reserva' ? 'selected' : '' }}>Reserva</option>
                <option value="probador" {{ old('status') === 'probador' ? 'selected' : '' }}>Probador</option>
            </select>

            <x-input-label>Nombre</x-input-label>
            <x-text-input name="nombre" />
            <x-input-label>Fecha de nacimiento</x-input-label>
            <x-text-input type="date" name="nacimiento" />
            <x-input-label>Nacionalidad</x-input-label>
            <x-text-input name="nacionalidad"/>

            <div x-show="status === 'titular' || status === 'reserva'">
                <x-input-label>Carreras ganadas</x-input-label>
                <x-text-input name="ganadas" />
                <x-input-label>Podios</x-input-label>
                <x-text-input name="podios" />
                <x-input-label>Puntos</x-input-label>
                <x-text-input name="puntos" />
            </div>

            <div x-show="status === 'probador'">
                <x-input-label>Vueltas</x-input-label>
                <x-text-input name="vueltas" />
            </div>
            <x-primary-button>Guardar piloto</x-primary-button>
        </form>
    </div>
</x-app-layout>