<?php

namespace App\Http\Controllers;

use App\Http\Resources\KanbanResource;
use App\Models\Kanban;
use Illuminate\Http\Request;

class KanbanApiController extends Controller
{

    public function show(Request $request)
    {
        $kanban = $request->user()->kanban();
        return new KanbanResource($kanban);
    }
}
