<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class PresetTemplate extends Model
{
    use Uuids;

    protected $fillable = ['name', 'uuid', 'category_id', 'description', 'content'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
