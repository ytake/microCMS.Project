<?php

return [

    'setup' => env('CMS_SETUP', false),

    'socialite' => [
        'driver' => env('CMS_SOCIAL_DRIVER', 'twitter'),
    ],
    'storage' => [
        'driver' => env('CMS_STORAGE_DRIVER', 'file')
    ],
];
