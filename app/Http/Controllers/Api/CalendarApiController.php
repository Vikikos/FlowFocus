<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Http\Requests\CalendarRequest;
use App\Http\Resources\CalendarCollection;
use App\Http\Resources\CalendarResource;
use App\Models\Chronometer;

class CalendarApiController extends Controller
{
    public function index()
    {
        return (new CalendarCollection(Chronometer::get()));
    }

    public function store(CalendarRequest $request)
    {
        $calendar = Calendar::create($request->validated());
        return (new CalendarResource($calendar));
    }

    public function show(Calendar $calendar)
    {
        return new CalendarResource($calendar);
    }

    public function update(CalendarRequest $request, Calendar $calendar)
    {
        $calendar->update($request->validated());
        return (new CalendarResource($calendar));
    }

    public function destroy(Calendar $calendar)
    {
        $calendar->delete();
        return response()->json(null,204);
    }
}
