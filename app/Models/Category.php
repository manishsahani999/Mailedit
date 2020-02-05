<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Category extends Model implements HasMedia
{
    use Uuids;
    use HasMediaTrait;

    protected $fillable = ['name'];


    public function presetTemplate()
    {
        return $this->hasMany('App\Models\PresetTemplate');
    }

}
