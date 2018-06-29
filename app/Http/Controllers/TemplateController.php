<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\{UtilityService, CreateService};
use App\Http\Requests\StoreTemplate;

class TemplateController extends Controller
{

    public function __construct(UtilityService $utility, CreateService $create)
    {
        $this->utility = $utility;
        $this->create = $create;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  Get all Templates
        $templates = $this->utility->getAllUserTemplates();

        // return view
        return view('pages.template.index', [
            'templates' => $templates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $template = $this->create->createUserTemplate($request->all());

        return redirect()->route('template.show', $template->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $template = $this->utility->getTemplate($uuid, 'uuid');

        return view('pages.template.show', [
            'template' => $template
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $template = $this->utility->getTemplate($uuid, 'uuid');

        return view('pages.template.edit', [
            'template' => $template
        ]);
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
        $template = $this->utility->getTemplate($uuid, 'uuid')->update($request->all());

        return redirect()->route('template.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $this->utility->getTemplate($uuid, 'uuid')->delete();
        return redirect()->back();
    }

    /*
    * Find template content
    */
    public function getContent($id)
    {   
        //  find template
        $template = $this->utility->getTemplate($id);

        if (($template)) {
            return response()->json($template);
        }
        else {
            return response()->json(['error' => 'Not found']);
        }
    }
}
