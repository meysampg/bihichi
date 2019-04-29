<?php

namespace Components\Exceptions;

use Exception;
use Throwable;

/**
 * Class ParameterMissingException used on case of parameter missed on a
 * function or method call
 *
 * @package Components\Exceptions
 */
class ParameterMissingException extends Exception
{
    private $class;
    private $parameter;

    public function __construct(string $class, string $parameter, int $code = 0, Throwable $previous = null)
    {
        $this->class     = $class;
        $this->parameter = $parameter;

        parent::__construct($parameter, $code, $previous);
    }

    public function __toString(): string
    {
        return "parameter {$this->class}::{$this->parameter} must be passed to the function.";
    }
}
