<?php

namespace App\Http\Controllers\Api;

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
    public function store(Request $request)
    {

        $validated = $request->validate([
            'predetermined'  => 'required|string|max:255',
            'work_duration'  => 'required|integer|min:1',
            'break_duration' => 'required|integer|min:1',
            'total_sessions' => 'required|integer|min:1',
        ]);

        $pomodoro = Pomodoro::create($validated);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pomodoro $pomodoro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pomodoro $pomodoro)
    {
        //
    }
}
