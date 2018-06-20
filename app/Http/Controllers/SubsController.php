<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubs;
use Illuminate\Http\Request;

class SubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($uuid)
    {
        $list = auth()->user()->binarySubsList()->where('uuid', $uuid)->first();
        return view('subs.create', [
            'list' => $list
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubs $request, $uuid)
    {
//        finding the list
        $list = auth()->user()->binarySubsList()->where('uuid', $uuid)->first();

//        Create New Subscriber
        $sub = $list->binarySubs()->create($request->all());

//        redirecting to list page
        return redirect()->route('subs.list.show', $list->uuid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid, $email)
    {
        //  Finding the list
        $list = auth()->user()->binarySubsList()->where('uuid', $uuid)->first();

        // Find the Subscriber
        $subs = $list->binarySubs()->whereEmail($email)->first();

        // Emails related to the user
        $emails = $subs->emails()->get();

        return view('subs.show', [
            'list'  => $list,
            'subs'  => $subs,
            'emails'=> $emails
        ]);
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
    public function update(Request $request, $id)
    {
        //
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
