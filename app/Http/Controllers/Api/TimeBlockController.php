<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimeBlockRequest;
use App\Http\Resources\CalendarResource;
use App\Http\Resources\TimeBlockCollection;
use App\Http\Resources\TimeBlockResource;
use App\Models\TimeBlock;

class TimeBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new TimeBlockCollection(TimeBlock::get()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TimeBlockRequest $request)
    {
        $timeBlock = TimeBlock::create($request->validate());
        return (new CalendarResource($timeBlock));
    }

    /**
     * Display the specified resource.
     */
    public function show(TimeBlock $timeBlock)
    {
        return new TimeBlockResource($timeBlock);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TimeBlockRequest $request, TimeBlock $timeBlock)
    {
        $timeBlock->update($request->validated());
        return (new CalendarResource($timeBlock));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeBlock $timeBlock)
    {
        $timeBlock->delete();
        return response()->json(null,204);
    }
}
