<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 6/14/2018
 * Time: 10:45 PM
 */

namespace App\Services;

use Illuminate\Support\Arr;
use App\Models\{BinarySubscriber, BinaryEmailTemplate, BinaryEmail};
use GuzzleHttp\Client as HttpClient;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Mail\DefaultMail;
use Carbon\Carbon;
use MongoDB\BSON\Binary;

class EmailService
{
    use DispatchesJobs;

    protected $subscriber;

    protected $emailObj;

    public function __construct()
    {

    }

    public function getSubscriber($reference)
    {
        $email = $reference['email'];

        if (isset($reference['name']))
            $name = split_name($reference['name']);
        else
            $name = [
                'first_name'  => '',
                'middle_name' => '',
                'last_name'   => ''
            ];

//        finding the subscriber
        $subscriber = BinarySubscriber::where('email', $email)->first();

        if (!isset($subscriber))
        {
            $subscriber = BinarySubscriber::create([
                'email' => $email,
                'first_name' => $name['first_name'],
                'last_name' => $name['last_name'],
                'email_verification_token' => str_random(60)
            ]);
        }

        return $this->subscriber = $subscriber;
    }


    public function getEmail($reference)
    {
        $template_id = 1;
        $emailContent = [];

        if(isset($reference['template']))
        {
            $template = BinaryEmailTemplate::where('name', $reference['template'])->first();

            if($template) {
                $content = isset($reference['content'])?$reference['content']:$template->content;
                $template_id = $template->id;
            }

        }


        $email = $this->subscriber->emails()->create([
            'token' => bin2hex(random_bytes(32)),
            'binary_template_id' => 1,
            'scheduled_time' => Carbon::now(),
            'content' => json_encode($reference['html']),
            'status' => 'not_sent'
        ]);

        return $this->emailObj = $email;
    }

    public function send($subscriber, $data)
    {
        $result = DB::transaction( function () use ($subscriber, $data) {
            $this->getSubscriber($subscriber);
            $this->getEmail($data);
            

            Mail::to($this->subscriber->email)
                ->send(new DefaultMail($this->subscriber,  $this->emailObj));

            $this->emailObj->status = 'sent';
            return $this->emailObj->save();
        });

        return $result;

    }
}