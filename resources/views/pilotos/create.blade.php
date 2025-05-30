<x-app-layout>
    <div x-data="{ status: '' }" class="p-6 bg-white shadow-md rounded-lg text-center">

        <select id="status-select" x-model="status">
            <option value="" disabled selected>-- Elige un estado --</option>
            <option value="titular">Titular</option>
            <option value="reserva">Reserva</option>
            <option value="probador">Probador</option>
        </select>

        <form action="">
            @csrf
            <x-input-label>Nombre</x-input-label>
            <x-text-input name="nombre" />
            <x-input-label>Fecha de nacimiento</x-input-label>
            <x-text-input type="datetime-local" name="nacimiento" />
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

            <div x-show="status === 'probador'">Soy el puto piloto probador</div>
            <x-primary-button>Guardar piloto</x-primary-button>
        </form>
    </div>
</x-app-layout>