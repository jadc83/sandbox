<?php

use App\Models\Probador;
use App\Models\Reserva;
use App\Models\Titular;
use Carbon\Carbon;

    function constructor($validated)
    {

        $firma = Carbon::now();
        $finiquito = $firma->addYears(3);

        if ($validated['status'] === 'titular')
        {
            $titular = new Titular();
            $titular->ganadas = $validated['ganadas'];
            $titular->podios = $validated['podios'];
            $titular->puntos = $validated['puntos'];
            $titular->inicio_contrato = $firma;
            $titular->fin_contrato = $finiquito;
            $titular->save();

            $titular->pilotos()->create([
                'nombre' => $validated['nombre'],
                'nacionalidad' => $validated['nacionalidad'],
                'nacimiento' => $validated['nacimiento']
            ]);

        } elseif ($validated->status === 'reserva') {

            $reserva = new Reserva();
            $reserva->ganadas = $validated['ganadas'];
            $reserva->podios = $validated['podios'];
            $reserva->puntos = $validated['puntos'];
            $reserva->inicio_contrato = $firma;
            $reserva->fin_contrato = $finiquito;
            $reserva->save();

            $reserva->piloto()->create([
                'nombre' => $validated->nombre,
                'nacionalidad' => $validated->nacionalidad,
                'nacimiento' => $validated->nacimiento]);

        } elseif ($validated->status === 'probador') {

            $probador = new Probador();
            $probador->vueltas = $validated['vueltas'];
            $probador->inicio_contrato = $firma;
            $probador->fin_contrato = $finiquito;

            $probador->save();
            $probador->piloto()->create([
                'nombre' => $validated->nombre,
                'nacionalidad' => $validated->nacionalidad,
                'nacimiento' => $validated->nacimiento]);
            }

        return redirect()->route('pilotos.index');
    }