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
    * return request data
    */
    public function campaignRequest($data)
    {
        return [
            'subject'       => $data['subject'],
            'from_name'     => $data['from_name'],
            'from_email'    => $data['from_email'],
            'reply_to'      => $data['reply_to'],
            'name'          => (isset($data['title'])) ? $data['title'] : 'Default Name',
            'description'   => $data['description'],
            'html'          => $data['html'],
            'text'          => $data['text'],
            'status'        => $data['status'],
            'allowed_files' => $data['allowed_files'],
            'query_string'  => (isset($data['query_string'])) ? $data['query_string']: null,
            'brand_logo'    => (isset($data['brand_logo'])) ? $data['brand_log']: null,
        ];

    }

    /*
    * Find All the Campaign
    */
    public function getAllCampaigns($slug)
    {
        return $this->getBrand($slug)->binaryCampaign()->get();
    }

    /*
    * Find the Latest Campaign
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

    /*
    * Find all templates 
    */
    public function getAllUserTemplates()
    {
        return auth()->user()->template()->latest()->get();
    }

    /*
    * Find template 
    */
    public function getTemplate($id)
    {
        return auth()->user()->template()->whereId($id)->first();
    }

        
}
