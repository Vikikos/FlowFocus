<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use Illuminate\Http\Request;

class KanbanController extends Controller
{
    
    public function index()
    {
        $kanban = Kanban::get();

        return view('kanban.index', compact('kanban'));
    }
    

   
    public function create()
    {
        return view('kanban.create');
    }

   
    public function store(Request $request)
    {
        $kanban = new Kanban();
        $kanban->name = $request->input('name');
        $kanban->save();

        return redirect()->route('kanban.index');
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
        //
    }

    
    public function destroy(Kanban $kanban)
    {
        //
    }
}
