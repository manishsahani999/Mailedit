<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\{BinarySubscriber, BinarySubsList};
use App\Mail\ListUploadedMail;
use Excel;
use File;
use Storage;

class UploadList implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $list;
    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(BinarySubsList $list, $data)
    {
        $this->list = $list;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $data = $this->data;
        $list = $this->list;

        if(!empty($data) && $data->count())
        {
            foreach ($data as $item) {
                
                if ($item->name && $item->email) {
                    $name = split_name($item->name);

                    $sub = BinarySubscriber::whereEmail($item->email)->first();
                    $check = $list->binarySubs()->whereEmail($item->email)->first();
                    if(!empty($sub) && empty($check)) {
                        $list->binarySubs()->attach($sub->id);
                    }
                    else 
                        $sub = $list->binarySubs()->firstOrcreate([
                            'first_name' => $name['first_name'],
                            'last_name'  => $name['last_name'],
                            'email'      => $item->email
                        ]);
                    
                }
            }
        }

        // \Log::info($list);
        $user = \App\User::find($list->user_id);
        \Mail::to($user->email)->send(new ListUploadedMail($list));
    }
}
