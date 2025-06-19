<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComentarioRequest;
use App\Http\Requests\UpdateComentarioRequest;
use App\Models\Comentario;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComentarioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComentarioRequest $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }

    public function comentar(Request $request, $comentable)
    {
        $request->validate([
            'contenido' => 'required|string|max:500',
        ]);

        $usuario = Auth::user();

        $comentario = new Comentario();
        $comentario->contenido = $request->contenido;
        $comentario->user_id = $usuario->id;
        $noticia = Noticia::find($comentable);
        $comentario->comentable()->associate($noticia);
        $comentario->save();

        return redirect()->route('noticias.show', ['noticia' => $comentable]);
    }
}
