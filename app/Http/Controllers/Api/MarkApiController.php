<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MarkRequest;
use App\Models\Mark;
use Illuminate\Http\Request;
use App\Http\Resources\MarkCollection;
use App\Http\Resources\MarkResource;

class MarkApiController
{

    public function index(Request $request): MarkCollection
    {
        $marks = $request->user()->marks()->get();
        return new MarkCollection($marks);
    }

    public function store(MarkRequest $request): MarkResource
    {
        $mark = $request->user()->marks()->create($request->validated());
        return (new MarkResource($mark));
    }

    public function show(Request $request, int|string $id): MarkResource
    {
        $mark = $request->user()
        ->marks()
        ->findOrFail($id);

        return new MarkResource($mark);
    }

    public function destroy(Request $request, int|string $id)
    {
        $mark = $request->user()
        ->marks()
        ->findOrFail($id);

        $mark->delete();

        return response()->json([
            'message' => 'Nota eliminada correctamente'
        ], 204);
    }
}
