<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinaryEmail extends Model
{
    use Uuids, SoftDeletes;

    protected $guarded =[];

    /**
     *
     * This has many Emails
     *
     */
    public function binarySubscriber()
    {
        return $this->belongsTo('App\Models\BinarySubscriber');
    }
}
