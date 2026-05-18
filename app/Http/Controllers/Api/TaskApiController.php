<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{

    public function index(Request $request)
    {
        $kanban = $request->user()->kanban;

        return new TaskCollection($kanban->tasks);
    }

    public function store(TaskRequest $request)
    {
        $kanban = $request->user()->kanban;

        $task = $kanban->tasks()->create($request->validated());

        return new TaskResource($task);
    }

    public function show(Request $request, Task $task)
    {
        $this->authorizeOwner($request, $task);
        return new TaskResource($task);
    }

    public function changeColumn(Request $request, Task $task)
    {
        $this->authorizeOwner($request, $task);

        $validated = $request->validate([
            'column' => 'required|in:new,progress,done'
        ]);

        $task->update([
            'column' => $validated['column']
        ]);

        return new TaskResource($task);
    }

    public function destroy(Request $request, Task $task)
    {
        $this->authorizeOwner($request, $task);

        $task->delete();
        return response()->json(null, 204);
    }

    private function authorizeOwner(Request $request, Task $task)
    {
        if ($task->kanban_id !== $request->user()->kanban->id) {
            abort(403, 'No tienes permiso para gestionar esta tarea.');
        }
    }
}
