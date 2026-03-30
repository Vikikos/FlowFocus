<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nota = new Nota();
        $nota->id_usuario = $request->input('id_usuario');
        $nota->titulo = $request->input('titulo');
        $nota->contenido = $request->input('contenido');
        $nota->fecha_creacion = $request->input('fecha_creacion');
        $nota->save();
        return redirect()->route('notas.index',$nota);
    }

    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nota $nota)
    {
        return view('notas.edit', compact('notas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nota $nota)
    {
        $nota->contenido = $request->input('contenido');
        $nota->titulo = $request->input('titulo');
        $nota->fecha_creacion = $request->input('fecha_creacion');
        $nota->id_usuario = $request->input('id_usuario');
        $nota->save();
        return view ('notas.index',$nota);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
