<?php

namespace LaPress\BlogFront\Collection\Mappings;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
interface MappingInterface
{
    /**
     * @return array
     */
    public static function get(): array;

    /**
     * @return string
     */
    public static function getType(): string;
}
