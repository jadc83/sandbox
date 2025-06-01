<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePilotoRequest;
use App\Http\Requests\UpdatePilotoRequest;
use App\Models\Piloto;
use App\Models\Probador;
use App\Models\Reserva;
use App\Models\Titular;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PilotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pilotos = Piloto::all();

        return view('pilotos.index', ['pilotos' => $pilotos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pilotos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePilotoRequest $request)
    {

        $firma = Carbon::now();
        $finiquito = $firma->addYears(3);

        if ($request->status === 'titular')
        {
            $titular = new Titular();
            $titular->ganadas = $request->ganadas;
            $titular->podios = $request->podios;
            $titular->puntos = $request->puntos;
            $titular->inicio_contrato = $firma;
            $titular->fin_contrato = $finiquito;
            $titular->save();

            $titular->pilotos()->create([
                'nombre' => $request->nombre,
                'nacionalidad' => $request->nacionalidad,
                'nacimiento' => $request->nacimiento]);

            return redirect()->route('pilotos.index');


        } elseif ($request->status === 'reserva') {

            $reserva = new Reserva();
            $reserva->ganadas = $request->ganadas;
            $reserva->podios = $request->podios;
            $reserva->puntos = $request->puntos;
            $reserva->inicio_contrato = $firma;
            $reserva->fin_contrato = $finiquito;
            $reserva->save();

            $reserva->piloto()->create([
                'nombre' => $request->nombre,
                'nacionalidad' => $request->nacionalidad,
                'nacimiento' => $request->nacimiento]);

            return redirect()->route('pilotos.index');

        } elseif ($request->status === 'probador') {

            $probador = new Probador();
            $probador->vueltas = $request->vueltas;
            $probador->inicio_contrato = $firma;
            $probador->fin_contrato = $finiquito;

            $probador->save();
            $probador->piloto()->create([
                'nombre' => $request->nombre,
                'nacionalidad' => $request->nacionalidad,
                'nacimiento' => $request->nacimiento]);

            return redirect()->route('pilotos.index');
        }

        return abort(403, 'Algo ha fallado en el registro del piloto');
    }

    /**
     * Display the specified resource.
     */
    public function show(Piloto $piloto)
    {
        return view('pilotos.show', ['piloto' => $piloto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Piloto $piloto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePilotoRequest $request, Piloto $piloto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Piloto $piloto)
    {
        $piloto->delete();

        return redirect()->route('pilotos.index');
    }

    public function cambiar(Piloto $piloto, Request $request)
    {

    }
}
