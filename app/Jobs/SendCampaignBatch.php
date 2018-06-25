<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\{UtilityService, EmailService};
use Log;

class SendCampaignBatch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $campaign;

    protected $subscribers;
    /**
     * Create a new job instance. 
     *
     * @return void
     */
    public function __construct($subscribers, $campaign)
    {
        $this->subscribers = $subscribers;
        $this->campaign = $campaign;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EmailService $emailService)
    {
        $this->campaign->update(['status' => 'sending' ]);

        foreach($this->subscribers as $subs)
        {
            $emailService->send($subs, $this->campaign);
        }
        
        $this->campaign->update(['status' => 'sent']);
        
    }
}
