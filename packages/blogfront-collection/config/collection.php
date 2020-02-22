<?php

return [
    'prefix' => 'collection_'.env('BLOGFRONT_COLLECTION_PREFIX').'_',
    'urlPrefix' => '',
    'requestCache' => true,
    'indexes' => [
        'post' => [
            \LaPress\Database\ModelResolver::resolve('Post'),
            \LaPress\Database\ModelResolver::resolve('Page')
        ],
        'taxonomy' => [
//            \LaPress\Database\ModelResolver::resolve('Category'),
//            \LaPress\Database\ModelResolver::resolve('PostTag'),
        ]
    ],
    'mappings' => [
        'post' => \LaPress\BlogFront\Collection\Mappings\PostTypeMapping::class,
        'taxonomy' => \LaPress\BlogFront\Collection\Mappings\TaxonomyMapping::class
    ]
];
