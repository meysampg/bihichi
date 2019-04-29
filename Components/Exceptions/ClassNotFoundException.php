<?php

namespace Components\Exceptions;

use Exception;
use Throwable;

/**
 * Class ClassNotFoundException used on calling an undefined class
 *
 * @package Components\Exceptions
 */
class ClassNotFoundException extends Exception
{
    private $class;

    public function __construct(string $parameter, int $code = 0, Throwable $previous = null)
    {
        $this->class = $parameter;

        parent::__construct($parameter, $code, $previous);
    }

    public function __toString(): string
    {
        return "class {$this->class} does not exits.";
    }
}
