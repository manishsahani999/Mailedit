<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BinaryCampaigns extends Model
{
    use Uuids;
    use SoftDeletes;
    public function binaryBrand() {
        return $this->belongsTo('App\Models\BinaryBrand');
    }
}
