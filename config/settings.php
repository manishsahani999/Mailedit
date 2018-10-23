<?php

return [
    'limit' => 100,
    'jobDelayTime' => 4,
    'app' => [
        'frontend_host_url' => env('SITE_URL', 'http://binarymail.herokuapp.com'),
        'frontend_host_url_admin' => env('ADMIN_URL', 'http://binarymail.herokuapp.com'),
        'test_tracking_token' => '447d2c8dc25efbc493788a322f1a00e7'
    ]
]

?>