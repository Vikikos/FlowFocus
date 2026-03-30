<?php

namespace App\Http\Controllers\Api;

use App\Models\Mark;
use Illuminate\Http\Request;

class MarkApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mark = new Mark();
        $mark->id_usuario = $request->input('id_usuario');
        $mark->titulo = $request->input('titulo');
        $mark->contenido = $request->input('contenido');
        $mark->fecha_creacion = $request->input('fecha_creacion');
        $mark->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Mark $mark)
    {
        return $mark;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mark $mark)
    {
        $mark->contenido = $request->input('contenido');
        $mark->titulo = $request->input('titulo');
        $mark->fecha_creacion = $request->input('fecha_creacion');
        $mark->id_usuario = $request->input('id_usuario');
        $mark->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mark $mark)
    {
        //
    }
}
