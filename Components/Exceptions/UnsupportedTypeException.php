<?php

namespace Components\Exceptions;

use Exception;
use Throwable;

/**
 * Class UnsupportedTypeException used on trying to perform operations on an
 * unsupported type
 *
 * @package Components\Exceptions
 */
class UnsupportedTypeException extends Exception
{
    private $type;

    public function __construct(string $parameter, int $code = 0, Throwable $previous = null)
    {
        $this->type = $parameter;

        parent::__construct($parameter, $code, $previous);
    }

    public function __toString(): string
    {
        return "currently we don't support type {$this->type}.";
    }
}
