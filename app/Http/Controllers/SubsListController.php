<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubsList;
use Illuminate\Http\Request;
use App\Services\UtilityService;

class SubsListController extends Controller
{
    public function __construct(UtilityService $utility)
    {
        $this->utility = $utility;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // all list
        $lists = auth()->user()->binarySubsList()->get();

        // redirecting to view/subs/lists/index
        return view('subs.lists.index', ['lists' => $lists]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubsList $request)
    {
        // Creating a new List
        $list = auth()->user()->binarySubsList()->create($request->all());

        // redirecting to index page
        return redirect()->route('subs.list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
//        find the list
        $list = $this->utility->getList($uuid);;

//        find all subs
        $subs = $list->binarySubs()->get();

//        redirecting to show page
        return view('subs.lists.show', [
            'list' => $list,
            'subs' => $subs
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
//        find the list
        $list = auth()->user()->binarySubsList()->where('uuid', $uuid)->first();

//        redirecting to view/subs/lists/edit
        return view('subs.lists.edit', [
            'list' => $list
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubsList $request, $uuid)
    {
//        find old list and updating
        $list = $this->utility->getList($uuid)->update($request->all());

//        redirecting to index page
        return redirect()->route('subs.list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
//        find the list and deleting
        $list = $this->utility->getList($uuid)->delete();

//        return to index page
        return redirect()->route('subs.list.index');
    }
}
