<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PomodoroRequest;
use App\Http\Controllers\Controller;
use App\Models\Pomodoro;
use Illuminate\Http\Request;

class PomodoroApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Pomodoro::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PomodoroRequest $request)
    {
        $pomodoro = Pomodoro::create([
            ...$request->validated(),
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'message' => 'Configuración de Pomodoro guardada',
            'data'    => $pomodoro
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Pomodoro $pomodoro)
    {
        return response()->json($pomodoro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PomodoroRequest $request, Pomodoro $pomodoro)
    {
        $pomodoro->update($request->validated());

        return response()->json([
            'message' => 'Configuración de Pomodoro actualizada',
            'data'    => $pomodoro
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pomodoro $pomodoro)
    {
        $pomodoro->delete();
        return response()->json(null,204);
    }
}
