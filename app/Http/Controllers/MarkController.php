<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;

class MarkController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('marks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marks.create');
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
        return redirect()->route('marks.index', $mark);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mark $mark)
    {
        return view('marks.edit', compact('mark'));
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
        return redirect()->route('marks.index', $mark);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mark $mark)
    {
        //
    }
}
