<?php

use Illuminate\Database\Seeder;
use App\Models\{BinaryBrand, BinaryCampaigns};

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'brand_name' => 'Demo',
                'slug'       => 'demo',
                'from_name'  => 'Charlie Harper',
                'user_id'    =>1,
                'from_email' => 'charlie@mailedit.com',
                'reply_to'   => 'info@mailedit.com'
            ]
        ];

        $campaigns = [
            [
                'name'             => 'Demo',
                'subject'           => 'Subject',
                'binary_brand_id'   => 1,
                'from_name'         => 'Charlie Harper',
                'from_email'        => 'charlie@mailedit.com',
                'reply_to'          => 'info@mailedit.com',
                'description'       => 'Descrition',
                'html'              => 'Html here',
                'text'              => 'Plain text',
                'allowed_files'     => '.pdf',
                'status'            => 'draft'
        ]
        ];
        foreach ($campaigns as $campaign) {
            BinaryCampaigns::create($campaign);    
        }

        foreach ($brands as $brand) {
            BinaryBrand::create($brand);
        }
    }
}
