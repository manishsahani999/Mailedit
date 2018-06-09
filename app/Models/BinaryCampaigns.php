<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class BinaryCampaigns extends Model
{
    use Uuids;

    public function binaryBrand() {
        return $this->belongsTo('App\Models\BinaryBrand');
    }
}
