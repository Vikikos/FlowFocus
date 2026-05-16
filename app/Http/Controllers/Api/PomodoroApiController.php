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
        $user = auth()->user();
    /**
        if (!$user) {
            return response()->json(['message' => 'No autenticado'], 401);
        }
*/
        $pomodoros = Pomodoro::all();

        //return response()->json($user->pomodoros);
        return response()->json($pomodoros);
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request) {
    $data = $request->validate([
        'predetermined' => 'required|string',
        'work_duration' => 'required|integer',
        'break_duration' => 'required|integer',
        'total_sessions' => 'required|integer',
    ]);

    // Asignamos el user_id automáticamente
    // Si aún no tienes login, puedes poner un 1 temporalmente
    $data['user_id'] = auth()->id() ?? 1;

    $pomodoro = Pomodoro::create($data);
    return response()->json($pomodoro, 201);
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
