<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PomodoroRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\PomodoroCollection;
use App\Http\Resources\PomodoroResource;
use App\Models\Pomodoro;
use Illuminate\Http\Request;

class PomodoroApiController extends Controller
{
    public function index(): PomodoroCollection
    {
        $pomodoros = Pomodoro::where('user_id', auth()->id())->get();

        return new PomodoroCollection($pomodoros);
    }

    public function store(Request $request): PomodoroResource
    {
        $data = $request->validate([
            'predetermined' => 'required|string',
            'work_duration' => 'required|integer',
            'break_duration' => 'required|integer',
            'total_sessions' => 'required|integer',
        ]);

        $data['user_id'] = auth()->id() ?? 1;

        $pomodoro = Pomodoro::create($data);

        return new PomodoroResource($pomodoro);
    }

    public function show(Pomodoro $pomodoro): PomodoroResource
    {
        return new PomodoroResource($pomodoro);
    }

    public function update(PomodoroRequest $request, Pomodoro $pomodoro): PomodoroResource
    {
        $pomodoro->update($request->validated());

        return new PomodoroResource($pomodoro);
    }

    public function destroy(Pomodoro $pomodoro)
    {
        $pomodoro->delete();
        return response()->json(null, 204);
    }
}
