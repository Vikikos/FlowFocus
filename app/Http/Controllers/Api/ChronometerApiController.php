<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChronometerCollection;
use App\Http\Resources\ChronometerResource;
use App\Models\Chronometer;
use Illuminate\Http\Request;
use App\Http\Requests\ChronometerRequest;

class ChronometerApiController extends Controller
{

    public function index(Request $request): ChronometerCollection
    {
        $chronometers = $request->user()->chronometers()->get();

        return new ChronometerCollection($chronometers);
    }

    public function store(ChronometerRequest $request): ChronometerResource
    {
        $chronometer = $request->user()->chronometers()->create($request->validated());

        return (new ChronometerResource($chronometer));
    }

    public function show(Request $request, int|string $id): ChronometerResource
    {
        $chronometer = $request->user()
        ->chronometers()
        ->findOrFail($id);
        return new ChronometerResource($chronometer);
    }


    public function update(ChronometerRequest $request, Chronometer $chronometer): ChronometerResource
    {
        if ($request->user()->id !== $chronometer->id_user) {
            abort(403, 'No tienes permiso para editar este cronómetro.');
        }
        $chronometer->update($request->validated());

        return new ChronometerResource($chronometer);
    }

    public function destroy(Request $request, int|string $chronometerId)
    {
        $chronometer = $request->user()->chronometers()->findOrFail($chronometerId);

        $chronometer->delete();

        return response()->json([
            'message' => 'Cronómetro eliminado correctamente'
        ], 204);
    }
}
