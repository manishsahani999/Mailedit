<?php

use Illuminate\Database\Seeder;
use App\Models\BinaryEmailTemplate;
use App\Services\CreateService;

class TemplateSeeder extends Seeder
{
    public function __construct(CreateService $create)
    {
        $this->create = $create;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $templates = [
            [
                'name' => 'mailToEmployerForApplicationDeadlineReminder3days' ,
                'parent_template' => 'base_template',
                'channel_id' => 1, 
                'subject' => 'Your {$internshipCategory} posting will expire in 3 days!',
                'content' => '<div style="text-align: left;"><span style="font-size:14px">Hi {$firstName},</span><p dir="ltr" style="font-size:14px;font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif;">This is just a reminder email that your <a href="{$internshipLink}">{$internshipCategory} internship</a> on letsintern will expire in 3 days.<br/><br/>Till now, your internship has received has <a href="{$ctaLink}">{$totalApps} applications</a>. Here is a short summary:<br/><br/>Selected: {$selected}<br/>Shortlisted: {$shortlisted}<br/>Pending: {$pending}<br/>Rejected: {$rejected}<br/><br/>We strongly recommend that you mark every candidate as Selected or Rejected before your Internship begins so that candidates view your organiation as responsible and intern-friendly.</p></div>',  
                'description' => 'sent to the employer 3 days before the posting expires',
                'markdown' => 'default'
            ],
            [
                'name' => 'mailToEmployerForApplicationDeadlineReminder3daysZeroApplications' , 
                'parent_template' => 'base_template', 
                'channel_id' => 1,
                'subject' => '3 days until your Posting expires on Letsintern!',
                'content' => '<div style="text-align: left;"><span style="font-size:14px">Hi {$firstName},</span><p dir="ltr" style="font-size:14px;font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif;">This is just a reminder email that your <a href="{$internshipLink}">{$internshipCategory} internship</a> on letsintern will expire in 3 days.<br/><br/>Your posting as we can see has not recieved any application and hence we strongly suggest that you revisit the internship details and edit it if haven\'t done already.<br/><br/>Most candidates prefer internships that are Paid and have enough clarity on what the internship is about, responsiblities, timings & perks.</p></div>',  
                'description' => 'sent to the employer 3 days before the posting expires for zero applications',
                'markdown' => 'default'
            ],
            [
                'name' => 'mailToEmployerForNewApplicationsOnInternships' , 
                'parent_template' => 'base_template', 
                'channel_id' => 1,
                'subject' => 'You have new application on your posting!',
                'content' => '<div style="text-align: left;"><span style="font-size:14px">Hi {$firstName},</span><p dir="ltr" style="font-size:14px;font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif;">You have new applications on your {$posting}. Here is a quick summry:<br/><br/>[i]. <a href={$applicationsLink[i]}>{$internshipCategory[i]}</a>: {$newApps[i]} new applications<br/><br/>Total Applications: {$totalApps[i]}<br/>Shortlisted: {$shortlisted[i]}<br/>Selected: {$selected[i]}<br/>Rejected: {$rejected[i]}<br/>Pending: {$pending[i]}<br/><br/>We strongly recommend that you mark every candidate as Selected or Rejected before your Internship begins so that candidates view your organiation as responsible and intern-friendly.</p></div>',  
                'description' => 'every day sent to the employer when postings receive new applications',
                'markdown' => 'default'
            ],
            [
                'name' => 'mailToEmployerOnJobClosed' , 
                'parent_template' => 'base_template', 
                'channel_id' => 1,
                'subject' => '{$firstName}, your {$internshipCategory} posting is now closed',
                'content' => '<div style="text-align: left;"><span style="font-size:14px">Hi {$firstName},</span><p dir="ltr" style="font-size:14px;font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif;">The application deadline for your <a href="{$internshipLink}">{$internshipCategory}</a> posting on Letsintern had expired 7 days back but we had extended it till today.<br/><br/>Your opportunity which now stands closed has received a total of <a href="{$ctaLink}">{$totalApps} applications</a> and here is a short summary:<br/><br/>Selected: {$selected}<br/>Shortlisted: {$shortlisted}<br/>Pending: {$pending}<br/>Rejected: {$rejected}<br/><br/>We would recommend going through all the applications in your pending list and updating their status (Shortlsted, Selected or Rejected).<br/>You may choose to interview the shortlisted candidates over a video call, in person or over the telephone as you like.</p></div>',  
                'description' => 'sent to the employer when posting is closed',
                'markdown' => 'default'
            ],
            [
                'name' => 'mailToEmployerOnJobClosedZeroApplications' , 
                'parent_template' => 'base_template', 
                'channel_id' => 1,
                'subject' => '{$firstName}, your {$internshipCategory} posting is now closed',
                'content' => '<div style="text-align: left;"><span style="font-size:14px">Hi {$firstName},</span><p dir="ltr" style="font-size:14px;font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif;">The application deadline for your <a href="{$internshipLink}">{$internshipCategory}</a> posting on Letsintern had expired 7 days back but we had extended it till today.<br/><br/>Your opportunity now stands closed.</p></div>',  
                'description' => 'sent to the employer when posting is closed with zero applications',
                'markdown' => 'default'
            ],
            [
                'name' => 'studentVerificationReminder' , 
                'parent_template' => 'base_template', 
                'channel_id' => 1,
                'subject' => 'Verify your Account & Start Applying',
                'content' => '<div style="text-align: left;"><span style="font-size:14px">Hello {$firstName},</span><p dir="ltr" style="font-size:14px;font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif;">You registered with us a while back but your account hasn\'t been verified yet. Since you registered, {$internships} more internships have been posted & you are missing out.<br/><br/>Internships from <span style="font-weight:600">{$companyName[i]}</span> and many more were posted recently. Why miss them?<br/><br/>To be able to apply to Internships and get matching internship notifications, you need to <a href="{$ctaLink}">verify</a> your account.<br/><br/>Your username is: {$email}</p></div>',  
                'description' => 'sent to students who have not verified their account',
                'markdown' => 'default'
            ],
            [
                'name' => 'studentLoginReminder' , 
                'parent_template' => 'base_template', 
                'channel_id' => 1,
                'subject' => '{$internships} new internships posted & {$shortlisted} students shortlisted, where are you?',
                'content' => '<div style="text-align: left;"><span style="font-size:14px">Hello {$firstName},</span><p dir="ltr" style="font-size:14px;font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif;">We saw you had registered & verified your account too a while back but then you never came back. Are you facing issues while accessing your account?<br/><br/>Your username is: {$email}<br/><br/>Its been raining internships and only in the last week, <span style="font-weight:600">{$internships} were added and {$shortlisted} students were shortlisted</span>. We just want to make sure you get your first internship faster<br/><br/>Here are some internships posted last week:<br/><br/><a href={$internshipLink1}>{$internshipCategory1} at {$companyName1}</a><br/>{$location1}<br/><br/><a href={$internshipLink2}>{$internshipCategory2} at {$companyName2}</a><br/>{$location2}<br/><br/><a href={$internshipLink3}>{$internshipCategory3} at {$companyName3}</a><br/>{$location3}<br/><br/><a href={$internshipLink4}>{$internshipCategory4} at {$companyName4}</a><br/>{$location4}<br/><br/><a href={$internshipLink5}>{$internshipCategory5} at {$companyName5}</a><br/>{$location5}</p></div>',  
                'description' => 'sent to students who have not loggedin',
                'markdown' => 'default'
            ],
            [
                'name' => 'studentProfileCompletionReminder' , 
                'parent_template' => 'base_template', 
                'channel_id' => 1,
                'subject' => 'Complete your profile and get your first internship faster!',
                'content' => '<div style="text-align: left;"><span style="font-size:14px">Hello {$firstName},</span><p dir="ltr" style="font-size:14px;font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif;">In order to apply for Internships & help us suggest <span style="font-weight:600">Preferred Internships</span> for you, a completed profile is necessary (and it only takes 3 minutes)<br/><br/>On an average, students who keep their profile updated at all times are 4 times more likely to get shortlisted as our employers are able to make a faster and better informed decision.<br/><br/>Your username is: {$email}</p></div>',  
                'description' => 'sent to students who have incomplete profile',
                'markdown' => 'default'
            ],
        ];
        
        foreach ($templates as $template) {
            $this->create->createTemplate($template);
        }
    }
}
