<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinaryCampaigns;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = auth()->user()->binaryBrand()->latest()->first();
        $campaign = $brands->binaryCampaign()->latest()->first();

        return view('home', ["brand" => $brands, "campaign" => $campaign]);
    }
}
