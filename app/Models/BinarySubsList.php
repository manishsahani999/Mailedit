<?php

namespace App;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinarySubsList extends Model
{
    use Uuids;

    use SoftDeletes;
    /**
     *
     *  This belongs to user
     *
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     *
     * A SubsList has many Subscribers
     *
     */
    public function binarySubs() {
        return $this->hasMany('App\Models\BinarySubscriber');
    }
}
