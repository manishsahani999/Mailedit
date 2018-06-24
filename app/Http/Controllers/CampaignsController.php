<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampaign;
use Illuminate\Http\Request;
use App\Models\{BinaryBrand, BinaryCampaigns};
use Carbon\Carbon;
use App\Services\UtilityService;

class CampaignsController extends Controller
{


    public function __construct(UtilityService $utility)
    {
        $this->utility = $utility;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        //  brand
        $brand = $this->utility->getBrand($slug);
        
        return view('pages.campaigns.create', [
            'brand' => $brand,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCampaign $request, $slug)
    {
        // data collection
        $data = $this->utility->campaignRequest($request->all());
        
        // Finding brand and Creating Campaign
        $campaign = $this->utility->getBrand($slug)->binaryCampaign()->create($data);

        // Session Message
        $request->session()->flash('success', 'Campaign created successfully');

        // redirecting to show route
        if (!$request->has('content')) {
            return redirect()->route('brand.show', [
                'slug' => $slug
            ]);
        } else {
            return redirect()->route('campaign.content.create', [
                'slug' => $slug,
                'uuid' => $campaign->uuid
            ]);
        }

    }

    public function content($slug, $uuid)
    {
        // find brand
        $brand = $this->utility->getBrand($slug);        

        // find campaign
        $campaign = $this->utility->getCampaign($slug, $uuid);

        //  All templates
        $templates = $this->utility->getAllUserTemplates();

        // redirecting
        return view('pages.campaigns.content', [
            'brand'     => $brand,
            'campaign'  => $campaign,
            'templates' => $templates
        ]);
    }

    public function contentStore(Request $request, $slug, $uuid)
    {
        // find brand
        $brand = $this->utility->getBrand($slug);        

        // find campaign
        $campaign = $this->utility->getCampaign($slug, $uuid)->update([
            'html' => (isset($request->html)) ? $request->html : null,
            'text' => (isset($request->text)) ? $request->text : null
        ]);
        
        // redirecting to show route
        if ($request->has('draft')) {
            return redirect()->route('brand.show', $brand->slug);
        }
        else {
            return redirect()->route('campaign.show', [
                'slug' => $slug,
                'uuid' => $uuid
            ]);
        }        
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
        $brand = $this->utility->getBrand($slug);        

        // find campaign
        $campaign = $this->utility->getCampaign($slug, $uuid);

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
        $brand = $this->utility->getBrand($slug);        

        // find campaign and Attaching the lists to table
        $campaign = $this->utility->getCampaign($slug, $uuid)->binarySubsList()->attach($request->lists);

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
        $brand = $this->utility->getBrand($slug);

        // find campaign and Attaching the lists to table
        $campaign = $this->utility->getCampaign($slug, $uuid)->binarySubsList()->detach($request->lists);

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
        $brand = $this->utility->getBrand($slug);

        // find campaign
        $campaign = $this->utility->getCampaign($slug, $uuid);

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
        $data = $this->utility->campaignRequest($request->all());
        
        //  find brand
        $brand = $this->utility->getBrand($slug);

        // find campaign and Updating
        $campaign = $this->utility->getCampaign($slug, $uuid)->update($data);

        // Session message
        $request->session()->flash('success', 'Campaign Updated successfully');

        // redirecting to show route
        if ($request->status == 'draft') {
            return redirect()->route('brand.show', [
                'slug' => $slug
            ]);
        } else {
            return redirect()->route('campaign.content.create', [
                'slug' => $slug,
                'uuid' => $uuid
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug, $uuid)
    {
        // find the list and deleting
        $list = $this->utility->getCampaign($slug ,$uuid)->delete();

        // return to index page
        return redirect()->route('brand.show', $slug);
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
        $brand = $this->utility->getBrand($slug);       

        // find campaign
        $campaign = $this->utility->getCampaign($slug, $uuid);

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
