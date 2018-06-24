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
        $campaign->update(['status' => 'sending' ]);

        foreach($subscribers as $subs)
        {
            $emailService->send($subs, $campaign);
        }
        
        $campaign->update(['status' => 'sent']);
        
    }
}
