<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kanban;
use Illuminate\Http\Request;

class KanbanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new KanbanCollection(Kanban::get()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kanban = Kanban::create($request->validated());
        return (new KanbanResource($kanban))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kanban $kanban)
    {
        return (new KanbanResource($kanban));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kanban $kanban)
    {
        $kanban->update($request->validated());
        return (new KanbanResource($kanban));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kanban $kanban)
    {
        $kanban->delete();
        return response()->json(null, 204);
    }
}
