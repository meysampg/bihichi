<?php

namespace Components\Containers;

use Components\Exceptions\PropertyNotFoundException;

/**
 * Class Bag is a container for values
 *
 * @package Components\Containers
 */
class Bag
{
    private $data;

    /**
     * Check if a property exists on the bag return it, otherwise throw an
     * exception
     *
     * @param $name
     *
     * @return mixed
     * @throws PropertyNotFoundException
     */
    public function __get($name)
    {
        if (property_exists(__CLASS__, $name)) {
            return $this->{$name};
        }

        return $this->get($name);
    }

    /**
     * Set a property on the bag on a magic way!
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->set($name, $value);
    }

    /**
     * Get a requested value
     *
     * @param $name
     *
     * @return mixed
     * @throws PropertyNotFoundException
     */
    public function get($name)
    {
        try {
            return $this->data[$name];
        } catch (\Exception $e) {
            throw new PropertyNotFoundException(__CLASS__, $name);
        }
    }

    /**
     * Set a property on the bag
     *
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        if (property_exists(__CLASS__, $name)) {
            $this->{$name} = $value;
        }

        $this->data[$name] = $value;
    }

    /**
     * indicate a variable is on the bag or not
     *
     * @param $name
     *
     * @return bool
     */
    public function has($name): bool
    {
        return isset($this->data[$name]);
    }
}
