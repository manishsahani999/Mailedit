<?php

namespace App\Services;
use App\Models\BinaryCampaigns;


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
    * Find All the Campaign
    */
    public function getLatestCampaigns($slug)
    {
        return $this->getBrand($slug)->binaryCampaign()->latest()->get();
    }

    /*
    * Find List
    */
    public function getList($uuid)
    {
        return auth()->user()->binarySubsList()->whereUuid($uuid)->first();
    }

    /*
    * Find ALL Lists linked to Campaign
    */
    public function getAllList($uuid)
    {
        return BinaryCampaigns::whereUuid($uuid)->first()->binarySubsList()->get();
    }

    /*
    * Find all members linked to Lists which are linked to Campaign 
    */
    public function getListMembers($uuid)
    {
        $lists = $this->getAllList($uuid);

        $emails = [];

        foreach ($lists as $list) {
            $members = $list->binarySubs()->get();
            
            foreach ($members as $member) {
                array_push($emails, $member);
            }
        }

        return $emails;
    }

        
}
