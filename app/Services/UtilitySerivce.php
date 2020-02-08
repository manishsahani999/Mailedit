<?php

namespace App\Services;
use App\Models\{BinaryBrand, BinaryCampaigns, BinaryEmailLink};
use Log;


class UtilityService
{
    /*
    * Find the brand 
    */
    public function getBrand($slug)
    {
        return auth()->user()->binaryBrand()->where('slug', $slug)->first();
    }

    public function getBrandPublic($slug)
    {
        return BinaryBrand::whereSlug($slug)->firstOrFail();
    }

    /*
    * Find the Campaign
    */
    public function getCampaign($slug ,$uuid)
    {
        return $this->getBrand($slug)->binaryCampaign()->whereUuid($uuid)->first();
    }

    /*
    * Find the Sequences
    */
    public function getSeq($slug ,$uuid)
    {
        return $this->getBrand($slug)->seq()->whereUuid($uuid)->first();
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
            'html'          => (isset($data['html'])) ? $data['html']: null,
            'text'          => (isset($data['text'])) ? $data['text']: null,
            'status'        => (isset($data['status'])) ? $data['status'] : 'draft',
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
    * Find the Latest Campaign paginated
    */
    public function getLatestCampaigns($slug)
    {
        return $this->getBrand($slug)->binaryCampaign()->latest()->paginate(5);
    }

     /*
    * Find the Latest Campaign
    */
    public function getRecentCampaigns($slug)
    {
        return $this->getBrand($slug)->binaryCampaign()->latest()->paginate(5);
    }
    
    /*
    * Find the Latest Campaign
    */
    public function getOngoingCampaigns($slug)
    {
        return $this->getBrand($slug)->binaryCampaign()->whereStatus('sending')->latest()->paginate(5);
    }

     /*
    * Find the Drafted Campaigns
    */
    public function getDraftCampaigns($slug)
    {
        return $this->getBrand($slug)->binaryCampaign()->whereStatus('draft')->latest()->paginate(5);
    }

     /*
    * Find Completed Campaigns
    */
    public function getCompletedCampaigns($slug)
    {
        return $this->getBrand($slug)->binaryCampaign()->whereStatus('sent')->latest()->paginate(5);
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
    public function getTemplate($id, $option = null)
    {
        if($option == 'uuid')
        {
            return auth()->user()->template()->whereUuid($id)->first();
        }
        return auth()->user()->template()->whereId($id)->first();
    }

    public function getEmailLink($uuid)
    {
        return BinaryEmailLink::where('binary_email_uuid', $uuid)->get();
    }

    /*
    * get all emails of a campaiogn
    */
    public function getAllEmails($uuid)
    {
        return BinaryCampaigns::whereUuid($uuid)->first()->emails()->get();
    }

    /*
    * require campaign uuid
    * @return links of every unique email 
    */
    public function getAllLinks($uuid)
    {
        $all_links = [];
        $emails= $this->getAllEmails($uuid);

        foreach($emails as $email)
        {
            $links = BinaryEmailLink::where('binary_email_uuid', $email->uuid)->get();            

            if($links->count() != 0){
                foreach($links as $link)
                {
                    array_push($all_links, $link);
                }   
            }          
            
        } 

        return $all_links;
            
    }

    /*
    * requires campaign $uuid
    * returns array of links name, all links are unique
    */
    public function getLinks($uuid)
    {
        $all_links = [];
        $emails= $this->getAllEmails($uuid);

        foreach($emails as $email)
        {
            $links = BinaryEmailLink::where('binary_email_uuid', $email->uuid)->get();
            if($links->count() != 0) {
                foreach($links as $key => $link)
                {
                    array_push($all_links, $link->url);
                }
            }
        }

        $all_links = array_unique($all_links);

        return $all_links;

    }

    public function getClickCount($uuid)
    {
        
        $clicked = 0;
        $all_links = $this->getAllLinks($uuid);

        if(count($all_links) != 0)
        {
            foreach($all_links as $link)
            {
                $clicked += $link->clicks;
            }
        } 
        return $clicked;
    }

    

    /*
    * return all opened count
    */
    public function getOpenedEmailCount($uuid)
    {
        $opened = 0;
        $emails= $this->getAllEmails($uuid);

        foreach ($emails as $email) {
            $opened += $email->opened;
        }
        return $opened;
    }

    
}
