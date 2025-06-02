<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePilotoRequest;
use App\Models\Piloto;
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
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'nacionalidad' => 'required|string',
            'nacimiento' => 'required|date',
            'status' => 'required|in:titular,reserva,probador',
            'ganadas' => 'required|integer',
            'podios' => 'required|integer',
            'puntos' => 'required|integer'
        ]);

      return constructor($validated);
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

}
