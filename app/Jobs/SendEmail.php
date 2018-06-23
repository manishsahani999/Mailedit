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

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $uuid;
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

        if($this->validateList())
        {
        $no_of_members = count($members);

        $limit = (int)config('settings.limit');
        $no_of_batches = $no_of_members/$limit;
        $left_subs = $no_of_members%$limit;

        if($no_of_batches == 0)
            $no_of_batches++;

        $start= 0;
        $end = $limit;
        $time = Carbon::now()->addSeconds(0);
        for ($i = 0; $i < $no_of_batches; $j++ ) {
            $subscribers = array_slice($member, $start, $end);
            dispatch(new SendCampaginBatch($subscribers, $uuid))->delay($time);
            $start = $end;
            $end = $end + $limit;

            $time->addSeconds(config('settings.jobDelayTime'));
        }
        
        $last = $no_of_members - 1;
        $subscribers = array_slice($member, $end, $last);
        }


    }

    public function validateList()
    {
        $members = $utility->getListMembers($this->uuid);

        if(count($members) == 0)
            return false;
        else
            return $members;
    }
}
