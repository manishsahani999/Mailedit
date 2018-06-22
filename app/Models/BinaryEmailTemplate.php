<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinaryEmailTemplate extends Model
{
    use SoftDeletes, Uuids;

    protected $fillable = [
        'name', 'description', 'markdown', 
        'channel_id', 'content', 'parent_template',
        'user_id', 'subject'
    ];

    public function user() 
    {
        return $this->belongsTo('App\User');
    }
}
