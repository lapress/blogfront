<?php

namespace LaPress\BlogFront\Collection\Mappings;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class PostTypeMapping implements MappingInterface
{
    public const TYPE = 'post';

    /**
     * @inheritDoc
     */
    public static function get(): array
    {
        return [
            'id'         => [
                'type' => 'integer',
            ],
            'title'      => [
                'type' => 'text',
            ],
            'excerpt'    => [
                'type' => 'text',
            ],
            'body'       => [
                'type' => 'text',
            ],
            'urlKey'     => [
                'type' => 'keyword',
            ],
            'categories' => [
                'type'       => 'nested',
                'properties' => [
                    'id'   => [
                        'type' => 'integer',
                    ],
                    'name' => [
                        'type' => 'text',
                    ],
                    'slug' => [
                        'type' => 'keyword',
                    ],
                ],
            ],
            'tags'       => [
                'type'       => 'nested',
                'properties' => [
                    'id'   => [
                        'type' => 'integer',
                    ],
                    'name' => [
                        'type' => 'text',
                        //                        'analyzer' => 'polish',
                    ],
                    'slug' => [
                        'type' => 'keyword',
                    ],
                ],
            ],
            'author'     => [
                'properties' => [
                    'avatar' => [
                        'type' => 'text',
                    ],
                    'key'    => [
                        'type' => 'keyword',
                    ],
                    'name'   => [
                        'type' => 'text',
                    ],
                ],
            ],
            'date'       => [
                'type'      => 'date',
                'format'    => 'yyyy-MM-dd HH:mm:ss',
            ],
            'type'       => [
                'type' => 'keyword',
            ],
//            'meta' => []
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getType(): string
    {
        return static::TYPE;
    }
}
