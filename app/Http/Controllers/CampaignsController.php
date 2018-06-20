<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampaign;
use Illuminate\Http\Request;
use App\Models\{BinaryBrand, BinaryCampaigns};
use Carbon\Carbon;

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

    /*
    * Find the brand
    *
    * @return $this brand 
    */
    public function getBrand($slug)
    {
        return auth()->user()->binaryBrand()->where('slug', $slug)->first();
    }

    /*
    *
    * Find the Campaign
    *
    * @return $this
    */
    public function getCampaign($slug ,$uuid)
    {
        return $campaign = $this->getBrand($slug)->binaryCampaign()->whereUuid($uuid)->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $brand = $this->getBrand($slug);
        
        return view('pages.campaigns.create', ['brand' => $brand]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCampaign $request, $slug)
    {
//        data collection
        $data = [
            'subject'       => $request->subject,
            'from_name'     => $request->from_name,
            'from_email'    => $request->from_email,
            'reply_to'      => $request->reply_to,
            'title'         => $request->name,
            'description'   => $request->description,
            'html'          => $request->htmltext,
            'text'          => $request->text,
            'status'        => $request->status,
            'allowed_files' => $request->allowed_files,
            'query_string'  => null,
            'brand_logo'    => $request->brand_logo,
        ];

        // Finding brand and Creating Campaign
        $campaign = $this->getBrand($slug)->binaryCampaign()->create($data);

        // Session Message
        $request->session()->flash('success', 'Campaign created successfully');

        // redirecting to show route
        return redirect()->route('campaign.show', [
            'slug' => $slug,
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
        // find brand
        $brand = $this->getBrand($slug);        

        // find campaign
        $campaign = $this->getCampaign($slug, $uuid);

        // finding all lists
        $lists = auth()->user()->binarySubsList()->get();

        // redirecting
        return view('pages.campaigns.show', [
            'brand'     => $brand,
            'campaign'  => $campaign,
            'lists'     => $lists
        ]);
    }

    /**
     * Add Lists to Campaigns
     *
     *  
     * 
     */
    public function addListsToCampaign(Request $request, $slug, $uuid) 
    {
        // find brand
        $brand = $this->getBrand($slug);        

        // find campaign and Attaching the lists to table
        $campaign = $this->getCampaign($slug, $uuid)->binarySubsList()->attach($request->lists);

        // Session Message
        $request->session()->flash('success', 'List added successfully');

        //        redirecting to show route
        return redirect()->route('campaign.show', [
            'slug' => $slug,
            'uuid' => $uuid
        ]);
    }

    /**
     * Remove Lists to Campaigns
     *
     *  
     * 
     */
    public function removeListsToCampaign(Request $request, $slug, $uuid) 
    {
        // find brand
        $brand = $this->getBrand($slug);

        // find campaign and Attaching the lists to table
        $campaign = $this->getCampaign($slug, $uuid)->binarySubsList()->detach($request->lists);

        // Session Message
        $request->session()->flash('success', 'List removed successfully');

        //        redirecting to show route
        return redirect()->route('campaign.show', [
            'slug' => $slug,
            'uuid' => $uuid
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $uuid)
    {
        //  find brand
        $brand = $this->getBrand($slug);

        // find campaign
        $campaign = $this->getCampaign($slug, $uuid);

        // returning
        return view('pages.campaigns.edit', [
            'brand'     => $brand,
            'campaign'  => $campaign
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCampaign $request, $slug, $uuid)
    {
        // data collection
        $data = [
            'subject'       => $request->subject,
            'from_name'     => $request->from_name,
            'from_email'    => $request->from_email,
            'reply_to'      => $request->reply_to,
            'name'          => $request->name,
            'description'   => $request->description,
            'html'          => $request->htmltext,
            'text'          => $request->text,
            'status'        => $request->status,
            'allowed_files' => $request->allowed_files,
            'query_string'  => null,
            'brand_logo'    => $request->brand_logo,
        ];

        //  find brand
        $brand = $this->getBrand($slug);

        // find campaign and Updating
        $campaign = $this->getCampaign($slug, $uuid)->update($data);

        // Session message
        $request->session()->flash('success', 'Campaign Updated successfully');

        // return
        return redirect()-> route('campaign.show', [
            'slug' => $slug,
            'uuid' => $uuid
        ]);
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

    /**
     * Update the schedule 
     *
     * \
     * @return 
     */
    public function storeSchedule(Request $request, $slug, $uuid)
    {
        // find the brand
        $brand = $this->getBrand($slug);       

        // find campaign
        $campaign = $this->getCampaign($slug, $uuid);

        // starts at
        $campaign_starts_at = $request->date.' '.$request->time;

        // Updating the Campaign
        $campaign->update(['status' => 'scheduled', 'starts_at' => $campaign_starts_at]);

        // Session message
        $request->session()->flash('success', 'Campaign Scheduled successfully');
        
        // returning to show page
        return redirect()->route('campaign.show', [
            'slug' => $slug,
            'uuid' => $uuid
        ]);
    }
}
