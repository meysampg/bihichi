<?php

namespace Components\Databases\Drivers;

/**
 * Class Pgsql handles operations related to the PostgreSQL driver of PDO
 *
 * @package Components\Databases\Drivers
 */
class Pgsql extends Driver
{
    protected const DSN = 'pgsql:host={host};dbname={dbname};user={username};password={password};charset={charset}';
}
