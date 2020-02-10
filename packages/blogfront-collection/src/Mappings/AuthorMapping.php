<?php

namespace LaPress\BlogFront\Collection\Mappings;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class AuthorMapping  implements MappingInterface
{
    public const TYPE = 'author';

    /**
     * @inheritDoc
     */
    public static function get(): array
    {
        return [
            'name' => [
                'type' => 'text'
            ],
            'key' => [
                'type' => 'keyword'
            ],
            'avatar' => [
                'type' => 'text'
            ],
            'urlKey' => [
                'type' => 'keyword'
            ]
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
