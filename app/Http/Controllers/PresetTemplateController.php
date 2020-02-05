<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePresetTemplate;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PresetTemplate;

class PresetTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preset_templates = PresetTemplate::all();

        return view('pages.preset_templates.index', ['preset_templates' => $preset_templates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.preset_templates.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresetTemplate $request)
    {
        $preset_template = PresetTemplate::create($request->all());

        return redirect()->route('admin.preset.design', $preset_template->uuid);
    }

    public function design($uuid)
    {
        $preset_template = PresetTemplate::whereUuid($uuid)->firstOrFail();

        return view('pages.preset_templates.design', ['preset_template' => $preset_template]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $preset_template = PresetTemplate::whereUuid($uuid)->firstOrFail();

        return view('pages.preset_templates.show', ['preset_template' => $preset_template]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $preset_template = PresetTemplate::whereUuid($uuid)->firstOrFail();

        $preset_template->update($request->all());

        if ($request->has('isHtml')) return 1;

        // return redirect()->route('admin.preset.show', $uuid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
