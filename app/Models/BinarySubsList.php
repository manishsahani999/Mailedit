<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinarySubsList extends Model
{
    use Uuids;

    use SoftDeletes;

    protected $fillable = [
        'name', 'uuid', 'user_id', 'binary_brand_id'
    ];
    
    /**
     *
     * This belongs to a User
     *
     * @return this 
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     *
     * A SubsList has many Subscribers and 
     * Subscribers can belongs to many list
     *
     * @return this
     */
    public function binarySubs() {
        return $this->belongsToMany('App\Models\BinarySubscriber', 'list_subs', 'list_id', 'subscriber_id');
    }

    /**
     *
     * This belongs to Many Campaigns
     *
     * @return this
     */
    public function binaryCampaign() {
        return $this->belongsToMany('App\Models\BinaryCampaigns');
    }

    /**
     *
     * This belongs to One Brand
     *
     * @return this
     */
    public function brand() {
        return $this->belongsToMany('App\Models\BinaryBrand', 'binary_brand_id');
    }
}
