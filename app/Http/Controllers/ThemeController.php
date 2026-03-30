<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $theme = new Theme();
        $theme->color_palette = $request->input('color_palette');
        $theme->mode = $request->input('mode');
        $theme->mostrar_Widgets = $request->input('mostrar_Widgets', false);
        $theme->transparency = $request->input('transparency');
        $theme->font = $request->input('font');
        $theme->save();
        return redirect()->route(themes.index,'theme');

    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        $theme->color_palette = $request->input('color_palette');
        $theme->mode = $request->input('mode');
        $theme->mostrar_Widgets = $request->input('mostrar_Widgets', false);
        $theme->transparency = $request->input('transparency');
        $theme->font = $request->input('font');
        $theme->save();
        return view(themes.index);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        //
    }
}
