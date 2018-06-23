<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\BinaryCampaigns;

class SendCampaignBatch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance. 
     *
     * @return void
     */
    public function __construct($subscribers, $uuid)
    {
        $this->uuid = $uuid;
        $this->subscribers = $subscribers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EmailService $emailService)
    {
        $campaign = BinaryCampaigns::whereUuid($this->uuid)->first();

        $campaign->update(['status' => 'sending' ]);

        foreach($subscribers as $subs)
        {
            $emailService->send($subs, $campaign);
        }
        
        $campaign->update(['status' => 'sent']);
        
    }
}
