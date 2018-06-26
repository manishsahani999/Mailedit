<?php

return [
    'limit' => 1,
    'jobDelayTime' => 1,
    'app' => [
        'frontend_host_url' => env('SITE_URL', 'https://messmerising.com'),
        'frontend_host_url_admin' => env('ADMIN_URL', 'http://messmerising.com'),
        'test_tracking_token' => '447d2c8dc25efbc493788a322f1a00e7',
        'track_link' => env('TRACKING_URL', 'link-tracker')
    ]
]

?>