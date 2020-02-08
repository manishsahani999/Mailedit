<?php

namespace App\Http\Controllers;

use App\Services\UtilityService;
use Illuminate\Http\Request;

class SequenceController extends Controller
{
    /**
     * Constructor 
     */
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        // Brand
        $brand = $this->utility->getBrand($slug);

        // Create Sequence 
        $seq = $brand->seq()->create(['name' => $brand->brand_name.'-Sequence-'.rand()]);

        return redirect()->route('seq.show', [$slug, $seq->uuid]);

        // All Campaigns
        // $campaigns = $this->utility->getLatestCampaigns($slug);

        // // view 
        // return view('pages.seq.create', [
        //     'brand' => $brand,
        //     'campaigns' => $campaigns
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $uuid)
    {
        $brand = $this->utility->getBrand($slug);

        $seq = $this->utility->getSeq($slug, $uuid);

        $campaigns = $this->utility->getLatestCampaigns($slug);

        return view('pages.seq.show', [
            'brand' => $brand,
            'seq'   => $seq,
            'campaigns' => $campaigns
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
