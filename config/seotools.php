<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => false, // set false to total remove
            'titleBefore'  => "Retrieval IT", // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => config('app.description'), // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['Retrieval IT, Website design','web development','retrieve','pos solution',' digital marketing',' it company bd'],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'index, follow', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => 'GTM-W5WH57P',
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => '3da65068d993958b',
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => false, // set false to total remove
            'description' => config('app.description'), // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'Website',
            'site_name'   => config('app.name'),
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary',
            'site'        => '@ItRetrieval',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => false, // set false to total remove
            'description' => config('app.description'), // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];