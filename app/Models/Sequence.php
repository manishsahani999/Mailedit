<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    use Uuids;

    protected $fillable = ['id', 'name', 'uuid', 'binary_brand_id', 'status', 'progress'];

    /**
     *
     * This belongs to a Brand
     *
     * @return this 
     */
    public function binaryBrand() {
        return $this->belongsTo('App\Models\BinaryBrand');
    }

    public function campaign()
    {
        return $this->belongsToMany('App\Models\BinaryCampaigns');
    }
}
