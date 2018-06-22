<?php

namespace App\Services;
use App\Models\BinaryEmailTemplate;


class CreateService 
{
    /*
    * Find the user templates
    */
    public function createUserTemplate($data)
    {
        return auth()->user()->template()->create($data);           
    }

    /*
    * Find the template
    */
    public function createTemplate($data)
    {
        return BinaryEmailTemplate::create($data);        
    }

    
}