<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinarySubscriber extends Model
{
    use Uuids;
    use SoftDeletes;

    /**
     *
     * This belongs to BinarySubsList
     *
     */
    public function binarySubsList() {
        return $this->belongsTo('App\Models\BinarySubsList');
    }
}
