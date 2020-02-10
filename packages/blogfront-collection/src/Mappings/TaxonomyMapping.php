<?php

namespace LaPress\BlogFront\Collection\Mappings;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class TaxonomyMapping implements MappingInterface
{
    public const KEY = 'taxonomy';

    /**
     * @inheritDoc
     */
    public static function get(): array
    {
        return [
            'id'     => [
                'type' => 'integer',
            ],
            'name'   => [
                'type' => 'text',
            ],
            'slug'   => [
                'type' => 'keyword',
            ],
            'urlKey' => [
                'type' => 'keyword',
            ],
            'path' => [
                'properties' => [
                    'name' => [
                        'type' => 'text',
                    ],
                    'urlKey' => [
                        'type' => 'text',
                    ],
                ]
            ],
            'count' => [],
            'type' => [
                'type' => 'keyword'
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getType(): string
    {
        return static::KEY;
    }
}
