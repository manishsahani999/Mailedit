<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\{TestMail, DefaultMail};
use Carbon\Carbon;
use App\Models\BinaryEmail;

class EmailController extends Controller
{

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    

    public function test(Request $request, $slug, $uuid)
    {
        //  find brand
        $brand = auth()->user()->binaryBrand()->where('slug', $slug)->first();

        // find campaign
        $campaign = $brand->binaryCampaign()->where('uuid', $uuid)->first(); 
        
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
            'slug' => $brand->slug,
            'uuid' => $campaign->uuid
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();

        $emails = BinaryEmail::with('binarySubscriber')->orderBy('scheduled_time', 'desc');
        return $emails;
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
}
