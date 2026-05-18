<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;
use App\Http\Requests\CalendarRequest;
use App\Http\Resources\CalendarCollection;
use App\Http\Resources\CalendarResource;

class CalendarApiController extends Controller
{
    public function index(Request $request) : CalendarCollection
    {
        $calendars = $request->user()->calendars()->get();

        return new CalendarCollection($calendars);
    }

    public function store(CalendarRequest $request)
    {
        $calendar = $request->user()->calendars()->create($request->validated());
        return new CalendarResource($calendar);
    }

    public function show(Request $request, int|string $id): CalendarResource
    {
        $calendar = $request->user()
        ->calendars()
        ->findOrFail($id);

        return new CalendarResource($calendar);
    }

    public function update(CalendarRequest $request, Calendar $calendar)
    {

        if ($request->user()->id !== $calendar->id_user) {
            abort(403, 'No tienes permiso para editar este calendario');
        }
        $calendar->update($request->validated());

        return new CalendarResource($calendar);
    }

    public function destroy(Request $request, int|string $id)
    {
        $calendar = $request->user()->calendars()->findOrFail($id);

        $calendar->delete();
         return response()->json([
            'message' => 'Calendario eliminado correctamente'
        ], 204);
    }
}
