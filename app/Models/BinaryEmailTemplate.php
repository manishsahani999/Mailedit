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
        'channel_id', 'content', 'subject', 
        'heading', 'parent_template', 'binary_email_type'
    ];
}
