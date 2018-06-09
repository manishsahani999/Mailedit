<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinaryBrand extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'brand_name', 'from_name', 'from_email', 'slug',
        'reply_to', 'query_string', 'allowed_files',
        'brand_logo', 'settings'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
