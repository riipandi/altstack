<?php

return [
    'meta'      => [
        'defaults'       => [
            'title'        => config('app.name'),
            'description'  => false, // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [],
            'canonical'    => null,  // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        'defaults' => [
            'title'       => config('app.name'),
            'description' => false,  // set false to total remove
            'url'         => null,   // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => config('app.name'),
            'images'      => [],
        ],
    ],
    'twitter' => [
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@riipandi',
        ],
    ],
];
