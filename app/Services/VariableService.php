<?php

namespace App\Services;



class VariableService
{
    /*
    * Find the brand 
    */
    public function getBrand($slug)
    {
        return auth()->user()->binaryBrand()->where('slug', $slug)->first();
    }

    /*
    * Find the Campaign
    */
    public function getCampaign($slug ,$uuid)
    {
        return $this->getBrand($slug)->binaryCampaign()->whereUuid($uuid)->first();
    }

    /*
    * Find All the Campaign
    */
    public function getAllCampaigns($slug)
    {
        return $this->getBrand($slug)->binaryCampaign()->get();
    }

    /*
    * Find List
    */
    public function getList($uuid)
    {
        return auth()->user()->binarySubsList()->whereUuid($uuid)->first();
    }

}
