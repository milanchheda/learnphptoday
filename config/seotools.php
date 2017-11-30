<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Learn PHP Today", // set false to total remove
            'description'  => 'A curated list of top-rated video tutorials from YouTube & snippets from Twitter.', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['PHP', 'Laravel', 'tweet snippets', 'JavaScript', 'Learn PHP', 'PHP7'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Learn PHP Today', // set false to total remove
            'description' => 'A curated list of top-rated video tutorials from YouTube & snippets from Twitter.', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [env('APP_URL') . '/images/homepage.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          'card'        => 'summary_large_image',
          'title'        => 'Learn PHP Today',
          'description'        => 'A curated list of top-rated video tutorials from YouTube & snippets from Twitter.',
          'site'        => '@learn_php_today',
          'creator'        => '@milanchheda',
          'image' => env('APP_URL') . '/images/homepage.png',
        ],
    ],
];
