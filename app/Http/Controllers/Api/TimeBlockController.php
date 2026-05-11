<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TimeblockRequest;
use App\Http\Resources\CalendarResource;
use App\Http\Resources\TimeblockCollection;
use App\Http\Resources\TimeblockResource;
use App\Models\Calendar;
use App\Models\Timeblock;

class TimeblockController extends Controller
{
    public function index(Request $request, $idCalendar): TimeblockCollection
    {
        $calendar = $request->user()->calendars()->findOrFail($idCalendar);

        return new TimeblockCollection($calendar->timeblocks()->orderBy('start','asc')->get());
    }

    public function store(TimeblockRequest $request, int|string $idCalendar)
    {
        $calendar = $request->user()->calendars()->findOrFail($idCalendar);
        $timeblock = $calendar->timeblocks()->create($request->validated());

        return new TimeblockResource($timeblock);
    }

    public function show(Request $request, int|string $idCalendar,int|string $idTimeblock)
    {
        $calendar = $request->user()->calendars()->findOrFail($idCalendar);
        $timeblock = $calendar->timeblocks()->findOrFail($idTimeblock);

        return new TimeblockResource($timeblock);
    }

    public function update(TimeblockRequest $request, int|string $idCalendar, Timeblock $timeblock)
    {
        $calendar = $request->user()->calendars()->findOrFail($idCalendar);

        if ($request->user()->id !== $calendar->id_user) {
            abort(403, 'No tienes permiso para editar este calendario');
        }

        if ($timeblock->id_calendar !== $calendar->id) {
            abort(403, 'Este bloque no pertenece a este calendario');
        }

        $timeblock->update($request->validated());
        return new TimeblockResource($timeblock);
    }

    public function destroy(Request $request, int|string $idCalendar, Timeblock $timeblock)
    {
        $calendar = $request->user()->calendars()->findOrFail($idCalendar);

        if ($timeblock->id_calendar !== $calendar->id) {
            abort(403, 'Este bloque no pertenece al calendario especificado.');
        }

        $timeblock->delete();
        return response()->json(null,204);
    }
}
