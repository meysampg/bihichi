<?php

namespace Components\Exceptions;

use Exception;
use Throwable;

/**
 * Class PropertyNotFoundException used on case of getting an undefined property
 *
 * @package Components\Exceptions
 */
class PropertyNotFoundException extends Exception
{
    private $class;
    private $property;

    public function __construct(string $class, string $parameter, int $code = 0, Throwable $previous = null)
    {
        $this->class    = $class;
        $this->property = $parameter;

        parent::__construct($parameter, $code, $previous);
    }

    public function __toString(): string
    {
        return "property {$this->class}::{$this->property} does not exits.";
    }
}
