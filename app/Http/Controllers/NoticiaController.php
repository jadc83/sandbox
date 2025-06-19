<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use App\Models\Meneo;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias.index', ['noticias' => $noticias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticiaRequest $request)
    {
        $validado = $request->validated([
            'titulo' => 'required|string|max:100',
            'contenido' => 'required|string|max:4000',
            'user_id' => 'required|exists:users,id',
        ]);

        $noticia = new Noticia();
        $noticia->titulo = $request->titular;
        $noticia->contenido = $request->contenido;
        $noticia->user_id = Auth::id();
        $noticia->save();

        return redirect()->route('noticias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        return view('noticias.show', ['noticia' => $noticia]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        return view('noticias.edit', ['noticia' => $noticia]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {
        return "hola soy el update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('noticias.index');
    }

    public function menear(Noticia $noticia)
    {
        $meneo = new Meneo();
        $meneo->noticia()->associate($noticia);
        $meneo->user_id = Auth::id();
        $meneo->save();

        return redirect()->route('noticias.index');
    }
}
