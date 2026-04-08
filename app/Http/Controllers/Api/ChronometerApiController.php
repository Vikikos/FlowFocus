<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChronometerCollection;
use App\Http\Resources\ChronometerResource;
use App\Models\Chronometer;
use App\Http\Requests\ChronometerRequest;

class ChronometerApiController extends Controller
{

    public function index(): ChronometerCollection
    {
        return (new ChronometerCollection(Chronometer::get()));
    }

    public function store(ChronometerRequest $request): ChronometerResource
    {
        // $chronometer = Chronometer::create($request->all());
        $chronometer = Chronometer::create($request->validated());

        return (new ChronometerResource($chronometer));
    }

    public function show(Chronometer $chronometer): ChronometerResource
    {
        return new ChronometerResource($chronometer);
    }


    public function update(ChronometerRequest $request, Chronometer $chronometer): ChronometerResource
    {
        // $chronometer->name = $request->input('name');
        // $chronometer->direction = $request->input('direction');
        // $chronometer->duration = $request->input('duration');

        // $chronometer->save();
        $chronometer->update($request->validated());

        return (new ChronometerResource($chronometer));
    }

    public function destroy(Chronometer $chronometer)
    {
        $chronometer->delete();
        return response()->json(null, 204);
    }
}
