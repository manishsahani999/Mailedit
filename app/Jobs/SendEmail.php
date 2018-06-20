<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\BinaryCampaigns;
use App\Services\{VariableService, EmailService};

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
    public function handle(EmailService $emailService, VariableService $variables)
    {
        $campaign = BinaryCampaigns::whereUuid($this->uuid)->first();
        $members = $variables->getListMembers($this->uuid);

        if (isset($members)) {
            foreach ($members as $member ) {
                $emailService->send($member, $campaign);
            }
        }

    }
}
