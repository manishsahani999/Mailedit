<?php

namespace App\Http\Controllers;

use App\Services\{EmailService, UtilityService};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\{TestMail, DefaultMail};
use Carbon\Carbon;
use App\Models\{BinaryEmail, BinaryCampaigns};
use App\Jobs\SendEmail;
use Session;

class EmailController extends Controller
{

    public function __construct(EmailService $emailService, UtilityService $utility)
    {
        $this->emailService = $emailService;
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
    public function create()
    {
        //
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
    public function show($id)
    {
        //
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


    /*
    *
    * Testing a single campaign;
    *
    *
    */
    public function test(Request $request, $slug, $uuid)
    {
        // find campaign
        $campaign = $this->utility->getCampaign($slug, $uuid); 
        
        // Campaign Data
        $data = [
            'subject' => $campaign->subject,
            'content' => $campaign->html,
        ];

        // Mailing to the email
        Mail::to($request->test_email)->send(new TestMail($data));

        // Session Messsage
        $request->session()->flash('success', 'Mail Sent successfully');

        return redirect()->route('campaign.show', [
            'slug' => $slug,
            'uuid' => $uuid
        ]);
    }

    /**
     * Testing the jobs
     *
     *
     * 
     */
    public function jobsTest($uuid)
    {

        dispatch(new SendEmail($uuid));
        
        // Session Message
        Session::flash('success', 'Sending Campaign');
        return redirect()->back();

        // $list = $this->utility->getListMembers($uuid);
        // $subscribers = array_slice($list, 0, 2);

        // return $subscribers;
        
    }
}
