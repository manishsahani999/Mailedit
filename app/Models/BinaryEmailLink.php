<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BinaryEmailLink extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'url', 'binary_email_uuid', 'clicks'
    ];
}
