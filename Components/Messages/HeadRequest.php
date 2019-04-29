<?php

namespace Components\Messages;

use Components\Containers\Bag;
use Components\Containers\Container;
use Components\Exceptions\UnsupportedTypeException;

/**
 * Class HeadRequest captures request and make it accessible in a property
 * manner fashion
 *
 * @package Components\Messages
 */
class HeadRequest extends Bag
{
    private $container;

    public function __construct()
    {
        $typeOfRequest = $this->getTypeOfRequest();

        // TODO: Move hardcore class definition to a bootstrap file
        $type  = ucfirst($typeOfRequest);
        $class = sprintf("Components\Messages\%sRequest", $type);

        if (is_null($this->container) && class_exists($class)) {
            $this->container = Container::i()->make($class, [], true);
        } else {
            throw new UnsupportedTypeException($class);
        }
    }

    /**
     * @inheritdoc
     */
    public function __get($name)
    {
        // if variable is on the container, return it
        if ($this->container->has($name)) {
            $this->container->{$name};
        }

        return parent::__get($name);
    }

    /**
     * Return type of request based on the header
     *
     * @return string
     */
    private function getTypeOfRequest(): string
    {
        return "json";
    }
}
