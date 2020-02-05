<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampaign;
use Illuminate\Http\Request;
use App\Models\{PresetTemplate};
use Carbon\Carbon;
use App\Jobs\{SendEmail, ScheduleCampaign};
use App\Services\UtilityService;
use Log;

class CampaignsController extends Controller
{
    /**
     * Constructor 
     */
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
        $templates = PresetTemplate::all();
        
        return view('pages.campaigns.create', [
            'brand' => $brand,
            'preset_templates' => $templates
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        //  brand
        $brand = $this->utility->getBrand($slug);
        
        // find campaign
        $campaign = $this->utility->getBrand($slug)->binaryCampaign()->create([
            'from_name' => $brand->from_name,
            'from_email' => $brand->from_email,
            'reply_to' => $brand->reply_to,
        ]);

        if ($request->has('preset_template')) {
            $preset = PresetTemplate::find($request->preset_template);
            $campaign->update([
                'html' => $preset->content
            ]);
        }

        return redirect()->route('campaign.design.page', [$slug, $campaign->uuid]);
    }

    /**
     * Store Info page 
     */
    public function storeInfo($slug, $uuid)
    {
        // find brand
        $brand = $this->utility->getBrand($slug);        

        // find campaign
        $campaign = $this->utility->getCampaign($slug, $uuid);

        return view('pages.campaigns.store_info', [
            'brand' => $brand,
            'campaign' => $campaign
        ]);
    }

    /**
     * Update Info Page
     */
    public function updateInfo(StoreCampaign $request, $slug, $uuid)
    {     
        // find campaign
        $campaign = $this->utility->getCampaign($slug, $uuid);

        $campaign->update($request->all());

        return redirect()->route('campaign.show', [$slug, $uuid]);
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
     * Content Design
     */
    public function designPage($slug, $uuid)
    {
        // find brand
        $brand = $this->utility->getBrand($slug);        

        // find campaign
        $campaign = $this->utility->getCampaign($slug, $uuid);

        return view('pages.campaigns.design', [
            'brand'     => $brand,
            'campaign'  => $campaign,
        ]);
    }

    /**
     * Update Design
     */
    public function designUpdate(Request $request, $slug, $uuid)
    {
        // find brand
        $brand = $this->utility->getBrand($slug);        

        // find campaign
        $campaign = $this->utility->getCampaign($slug, $uuid);

        $campaign->update(['html' => $request->html]);

        if ($campaign->name) return 2;
        return 1;
    }

    /**
     * 
     * Schedule Page
     * 
     */
    public function schedulePage($slug, $uuid)
    {
        // find brand
        $brand = $this->utility->getBrand($slug);        

        // find campaign
        $campaign = $this->utility->getCampaign($slug, $uuid);

        return view('pages.campaigns.schedule', [
            'brand' => $brand,
            'campaign' => $campaign
        ]);
    }

    /**
     * 
     * Sending the campaign
     *
     * 
     */
    public function sendCampaign($uuid)
    {
        dispatch(new SendEmail($uuid));

        return redirect()->back();
    }

    /**
     * 
     * Schedule Update
     * 
     */
    public function scheduleUpdate(Request $request, $slug, $uuid)
    {
        return $request->all();
    }


    public function recentCampaign($slug)
    {
         // find the brand
        $brand = $this->utility->getBrand($slug);

        // get recent Campaigns
        $campaigns = $this->utility->getRecentCampaigns($slug);

        return view('pages.brand.show', [
            'brand' => $brand,
            'campaigns' => $campaigns
        ]);  
    }

    public function ongoingCampaign($slug)
    {
         // find the brand
        $brand = $this->utility->getBrand($slug);

        // get ongoing Campaigns
        $campaigns = $this->utility->getOngoingCampaigns($slug);

        return view('pages.brand.show', [
            'brand' => $brand,
            'campaigns' => $campaigns
        ]);  
    }

    public function draftCampaign($slug)
    {
         // find the brand
        $brand = $this->utility->getBrand($slug);

        // get drafted Campaigns
        $campaigns = $this->utility->getDraftCampaigns($slug);

        return view('pages.brand.show', [
            'brand' => $brand,
            'campaigns' => $campaigns
        ]);  
    }

    public function completedCampaign($slug)
    {
         // find the brand
        $brand = $this->utility->getBrand($slug);

        // get drafted Campaigns
        $campaigns = $this->utility->getCompletedCampaigns($slug);

        return view('pages.brand.show', [
            'brand' => $brand,
            'campaigns' => $campaigns
        ]);  
    }

    /*
    * Show the Campaign stats
    *
    */
    public function stats($slug, $uuid)
    {
        // find brand
        $brand = $this->utility->getBrand($slug);        

        // find campaign
        $campaign = $this->utility->getCampaign($slug, $uuid);

        // Total count of all links
        $clicked = $this->utility->getClickCount($uuid);
        
        // links with 
        $links = $this->utility->getLinks($uuid);
        
        $opened = $this->utility->getOpenedEmailCount($uuid); 
        
        return view('pages.campaigns.stats', [
           'brand'    => $brand,
           'campaign' => $campaign,
           'clicked'  => $clicked ,
           'opened'   => $opened,
           'links'    => ($links)? $links: null
        ]);
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
        return view('pages.campaigns.design', [
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

        Toastr()->info('Campaign Designed', $this->utility->getCampaign($slug, $uuid)->name, ["positionClass" => "toast-bottom-right"]);
        
        return 1; 
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
        Toastr()->success('List Added', 'Campaign', ["positionClass" => "toast-bottom-right"]);

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
        Toastr()->success('List Removed', 'Campaign', ["positionClass" => "toast-bottom-right"]);

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
        Toastr()->info('Campaign Updated', 'Campaign', ["positionClass" => "toast-bottom-right"]);

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
        $this->utility->getCampaign($slug ,$uuid)->delete();

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
        
        //  Set date and time
        $time = Carbon::parse($request->date.$request->time);

        dispatch(new ScheduleCampaign($uuid))->delay($time);

        // Updating the Campaign
        $campaign->update(['status' => 'scheduled', 'starts_at' => $time]);

        // Session message
        Toastr()->info('Campaign Scheduled', 'Campaign', ["positionClass" => "toast-bottom-right"]);        
        
        // returning to show page
        return redirect()->route('campaign.show', [
            'slug' => $slug,
            'uuid' => $uuid
        ]);
    }

    
}
