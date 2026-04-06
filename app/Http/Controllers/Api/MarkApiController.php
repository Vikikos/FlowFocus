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
        return (new MarkCollection(Mark::get()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mark = Mark::create($request->validated());
        return (new MarkResource($mark))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mark $mark)
    {
        return new MarkResource($mark);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mark $mark)
    {
        $mark = Mark::update($request->validated());
        return (new MarkResource($mark));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mark $mark)
    {
        $mark->delete();
        return response()->json(null, 204);
    }
}
