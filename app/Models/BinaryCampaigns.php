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

    /**
     *
     * This belongs to a Brand
     *
     * @return this 
     */
    public function binaryBrand() {
        return $this->belongsTo('App\Models\BinaryBrand');
    }
    
    /**
     *
     * A Campaign can have many Lists and 
     * A List can belongs to many Campaigns
     *
     * @return this
     */
    public function binarySubsList() {
        return $this->belongsToMany('App\Models\BinarySubsList', 'campaign_list', 'campaign_id', 'list_id');
    }
}
