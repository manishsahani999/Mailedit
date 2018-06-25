<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\BinaryCampaigns;
use App\Services\{UtilityService, EmailService};
use Carbon\Carbon;
use App\Jobs\SendCampaignBatch;
use Log;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $uuid;
    protected $list;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * Execute the job.
     *
     * @return void 
     */
    public function handle(UtilityService $utility)
    {

        $list = $utility->getListMembers($this->uuid);
        $campaign = BinaryCampaigns::whereUuid($this->uuid)->firstOrFail();

        
        $count = count($list);
        $limit = config('settings.limit');

        $no_of_batches = $count/$limit;
        $no_of_left_members = $count%$limit;


        $time= Carbon::now();
        $start = 0;

        if($no_of_batches > 0)
        {
            $end = $limit;
            for($i=0; $i < $no_of_batches; $i++)
            {
                $subscribers = array_slice($list, $start, $end);
                dispatch(new SendCampaignBatch($subscribers, $campaign))->delay($time);
                
                $start = $end;
                $end += $limit;
                $time = $time->addMinutes(10);
            }

            $subscribers = array_slice($list, $end, $count);
            dispatch(new SendCampaignBatch($subscribers, $campaign))->delay($time);
        }

    }

}
