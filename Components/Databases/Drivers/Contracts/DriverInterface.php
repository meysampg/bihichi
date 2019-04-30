<?php

namespace Components\Databases\Drivers\Contracts;

/**
 * Interface DriverInterface specifies a set of contracts for defining a PDO
 * driver
 *
 * @package Components\Databases\Drivers
 */
interface DriverInterface
{
    /**
     * return a DSN string which is compatible with the driver
     *
     * @return string
     */
    public function getDSN(): string;
}
