<?php

namespace Components\Databases\Drivers;

/**
 * Class Mysql handles operations related to the MySQL driver of PDO
 *
 * @package Components\Databases\Drivers
 */
class Mysql extends Driver
{
    protected const DSN = 'mysql:host={host};dbname={dbname};username={username};password={password};charset={charset}';
}
