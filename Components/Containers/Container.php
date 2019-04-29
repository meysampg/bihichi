<?php

namespace Components\Containers;

use Components\Exceptions\ParameterMissingException;
use ReflectionClass;

/**
 * Class Container acts as an IoC container
 *
 * @package Components\Containers
 */
class Container extends Singleton
{
    /**
     * @var array $singletons save singleton instances
     */
    private $singletons = [];

    /**
     * Make or return an instance of object
     *
     * @param string $name   FQN of object
     * @param array  $params A key-value array of constructors params
     * @param bool   $mustBeSingleton
     *
     * @return object
     * @throws ParameterMissingException
     * @throws \ReflectionException
     */
    public function make(string $name, array $params = [], bool $mustBeSingleton = false)
    {
        if ($mustBeSingleton) {
            return $this->makeSingleton($name, $params);
        }

        return $this->makeObject($name, $params);
    }

    /**
     * Add an object to the container
     *
     * @param string $name
     * @param array  $param
     *
     * @return object
     * @throws ParameterMissingException
     * @throws \ReflectionException
     */
    public function makeObject(string $name, array $param = []): object
    {
        $ref  = new ReflectionClass($name);
        $cons = $ref->getConstructor();

        if ($cons === null || 0 == $cons->getNumberOfParameters()) {
            return new $name;
        }

        $params = [];
        foreach ($cons->getParameters() as $parameter) {
            /* @var \ReflectionType $type */
            $type = $parameter->getType();

            if ($type !== null && !$type->isBuiltin()) {
                $params[$parameter->getName()] = $this->makeObject($type->getName(), $param);
            } else {
                if (array_key_exists($parameter->getName(), $param)) {
                    $params[$parameter->getName()] = $param[$parameter->getName()];
                } else {
                    if (!$parameter->isOptional()) {
                        throw new ParameterMissingException($name, $parameter->getName());
                    }
                }
            }
        }

        return new $name(...array_values($params));
    }

    /**
     * Create a singleton instance of a given FQN class
     *
     * @param string $name
     * @param array  $params
     *
     * @return object
     * @throws ParameterMissingException
     * @throws \ReflectionException
     */
    public function makeSingleton(string $name, array $params = []): object
    {
        if ($this->live($name)) {
            return $this->singletons[$name];
        }

        return $this->singletons[$name] = $this->makeObject($name, $params);
    }

    /**
     * Check an instance of singleton is created or not
     *
     * @param $name
     *
     * @return bool
     */
    public function live($name): bool
    {
        return isset($this->singletons[$name]);
    }
}
