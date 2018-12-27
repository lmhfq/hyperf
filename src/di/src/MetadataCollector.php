<?php

namespace Hyperflex\Di;


use Hyperflex\Utils\Arr;

abstract class MetadataCollector implements MetadataCollectorInterface
{

    /**
     * Subclass MUST override this property.
     *
     * @var array
     */
    protected static $container = [];

    /**
     * Retrieve the metadata via key.
     */
    public static function get(string $key, $default = null)
    {
        return Arr::get(static::$container, $key) ?? $default;
    }

    /**
     * Set the metadata to holder.
     */
    public static function set(string $key, $value): void
    {
        Arr::set(static::$container, $key, $value);
    }

    /**
     * Determine if the metadata exist.
     * If exist will return true, otherwise return false.
     */
    public static function has(string $key): bool
    {
        return Arr::has(static::$container, $key);
    }

    /**
     * Serialize the all metadata to a string.
     */
    public static function serialize(): string
    {
        return serialize(static::$container);
    }

    /**
     * Deserialize the serialized metadata and set the metadata to holder.
     */
    public static function deserialize(string $metadata): bool
    {
        $data = unserialize($metadata);
        static::$container = $data;
        return true;
    }

    public static function getContainer(): array
    {
        return static::$container;
    }
}