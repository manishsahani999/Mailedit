<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BinaryCampaigns extends Model
{
    use Uuids;
    use SoftDeletes;

    protected $fillable = [
        'id', 'uuid', 'subject', 'binary_brand_id', 'from_name', 'from_email',
        'reply_to', 'name', 'description', 'html', 'text', 'starts_at',
        'ends_at', 'recipients_count', 'sent_count', 'sending_count', 'status',
        'allowed_files',
    ];

    public function binaryBrand() {
        return $this->belongsTo('App\Models\BinaryBrand');
    }
    
}
