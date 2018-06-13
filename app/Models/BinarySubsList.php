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
        'name', 'uuid',
    ];
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
