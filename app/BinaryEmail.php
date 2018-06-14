<?php

namespace App;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinaryEmail extends Model
{
    use Uuids, SoftDeletes;

    protected $guarded =[];
}
