<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\BinaryCampaigns;
use App\Services\{UtilityService, EmailService};

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
    public function handle(EmailService $emailService, UtilityService $utility)
    {
        $campaign = BinaryCampaigns::whereUuid($this->uuid)->first();
        $members = $utility->getListMembers($this->uuid);

        if (isset($members)) {
            $campaign->update([
                'recipients_count' => count($members),
                'status'           => 'sending' 
            ]);
            foreach ($members as $member ) {
                $emailService->send($member, $campaign); 
            }
            $campaign->update([
                'status' => 'sent'
            ]);
        }

    }
}
