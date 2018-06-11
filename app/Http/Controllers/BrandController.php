<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrand;
use Illuminate\Http\Request;
use App\Models\BinaryBrand;

class BrandController extends Controller
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
    public function create()
    {
        return view('pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrand $request)
    {
        // Collection  of Request data
        $data = [
            'brand_name'    => $request->brand_name,
            'slug'          => str_slug($request->brand_name, '-'),
            'from_name'     => $request->from_name,
            'from_email'    => $request->from_email,
            'reply_to'      => $request->reply_to,
            'allowed_files' => $request->allowed_files,
            'query_string'  => null,
            'brand_logo'    => $request->brand_logo,
            'setting'      => $request->settings,
        ];

        // Creating new Brand
        $new = auth()->user()->binaryBrand()->create($data);

        // redirecting to show page
        return redirect()->route('brand.show', $new->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $brand = auth()->user()->binaryBrand()->where('slug', $slug)->first();
        $campaigns = $brand->binaryCampaign()->get();
        return view('pages.brand.show', [
            'brand' => $brand,
            'campaigns' => $campaigns
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $brand = auth()->user()->binaryBrand()->where('slug', $slug)->first();
        return view('pages.brand.edit', [
            'brand' => $brand
        ]);
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
