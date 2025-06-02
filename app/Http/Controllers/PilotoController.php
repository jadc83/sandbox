<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePilotoRequest;
use App\Models\Piloto;
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
    public function store(Request $request)
    {
        $reglasBasicas = [
            'nombre' => 'required|string|max:255',
            'nacionalidad' => 'required|string',
            'nacimiento' => 'required|date',
            'status' => 'required|in:titular,reserva,probador',
        ];

        if ($request->status === 'titular' || $request->status === 'reserva') {

            $reglasExtra = [
                'ganadas' => 'required|integer',
                'podios' => 'required|integer',
                'puntos' => 'required|integer',
            ];
        } elseif ($request->status === 'probador') {

            $reglasExtra = [
                'vueltas' => 'required|integer',
            ];
        } else {

            $reglasExtra = [];
        }

        $validated = array_merge($reglasBasicas, $reglasExtra);
        return constructor($request->validate($validated));
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
        return view('pilotos.edit', ['piloto' => $piloto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Piloto $piloto)
    {

        $firma = Carbon::now();
        $finiquito = $firma->addYears(3);

        if ($request->status === 'titular'){

            $titular = new Titular();
            $titular->ganadas = $piloto->asignable->ganadas;
            $titular->podios = $piloto->asignable->podios;
            $titular->puntos = $piloto->asignable->puntos;
            $titular->inicio_contrato = $firma;
            $titular->fin_contrato = $finiquito;
            $titular->save();

            $piloto->asignable()->associate($titular);

            return redirect()->route('pilotos.index');

        } elseif ($request->status === 'reserva') {

            return "hola";

        } else {

            return "adios";

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Piloto $piloto)
    {
        $piloto->delete();

        return redirect()->route('pilotos.index');
    }

    public function cambiar(Request $request, Piloto $piloto){


    }

}
