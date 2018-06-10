<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{BinaryBrand, BinaryCampaigns};

class CampaignsController extends Controller
{
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
        $brand = auth()->user()->binaryBrand()->where('slug', $slug)->first();
        return view('pages.campaigns.create', ['brand' => $brand]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
//        data collection
        $data = [
            'subject'       => $request->subject,
            'from_name'     => $request->from_name,
            'from_email'    => $request->from_email,
            'reply_to'      => $request->reply_to,
            'name'          => $request->name,
            'description'   => $request->description,
            'html'          => $request->htmltext,
            'text'          => $request->text,
            'status'    => $request->status,
            'allowed_files' => $request->allowed_files,
            'query_string'  => null,
            'brand_logo'    => $request->brand_logo,
        ];

//        finding brand
        $brand = auth()->user()->binaryBrand()->where('slug', $slug)->first();

//        Creating Campaign
        $campaign = $brand->binaryCampaign()->create($data);

//        redirecting to show route
        return redirect()->route('campaign.show', [
            'slug' => $brand->slug,
            'uuid' => $campaign->uuid
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $uuid)
    {
//        find brand
        $brand = auth()->user()->binaryBrand()->where('slug', $slug)->first();

//        find campaign
        $campaign = $brand->binaryCampaign()->where('uuid', $uuid)->first();

//        redirecting
        return view('pages.campaigns.show', [
            'brand'     => $brand,
            'campaign'  => $campaign
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
