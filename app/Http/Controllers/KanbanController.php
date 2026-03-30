<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use Illuminate\Http\Request;

class KanbanController extends Controller
{

    public function index()
    {
        $kanban = Kanban::get();
    }



    public function create()
    {

    }


    public function store(Request $request)
    {
        $kanban = new Kanban();
        $kanban->name = $request->input('name');
        $kanban->save();


    }

    public function show(Kanban $kanban)
    {

    }


    public function edit(Kanban $kanban)
    {
        //
    }


    public function update(Request $request, Kanban $kanban)
    {
        $kanban->name = $request->input('name');
        $kanban->save();
    }


    public function destroy(Kanban $kanban)
    {
        //
    }
}
