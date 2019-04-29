<?php

namespace Components\Exceptions;

use Exception;
use Throwable;

/**
 * Class MethodNotFoundException used on calling an undefined method
 *
 * @package Components\Exceptions
 */
class MethodNotFoundException extends Exception
{
    private $class;
    private $method;

    public function __construct(string $class, string $parameter, int $code = 0, Throwable $previous = null)
    {
        $this->class  = $class;
        $this->method = $parameter;

        parent::__construct($parameter, $code, $previous);
    }

    public function __toString(): string
    {
        return "method {$this->class}::{$this->method}() does not exits.";
    }
}
