<?php

namespace Components\Containers;

/**
 * Class Singleton is a singleton container
 *
 * @package Components\Containers
 */
abstract class Singleton
{
    protected static $instance;

    private function __construct()
    {
    }

    /**
     * A shorthand for getInstance method
     *
     * @return static
     */
    public static function i(): object
    {
        return static::getInstance();
    }

    /**
     * Return a singleton instance of a required class
     *
     * @return static
     */
    public static function getInstance(): object
    {
        if (static::$instance == null) {
            static::$instance = new static; // LSB
        }

        return static::$instance;
    }
}
