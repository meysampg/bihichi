<?php

namespace Components\Databases\Drivers;

use Components\Databases\Drivers\Contracts\DriverInterface;
use Helpers\Arr;
use Helpers\Str;

/**
 * Class Driver represent the driver of a DBMS operator
 *
 * @package Components\Databases\Drivers
 */
abstract class Driver implements DriverInterface
{
    protected const DSN = '';

    /**
     * container of PDO information
     *
     * @var array
     */
    protected $data;

    public function __construct(
         string $database,
         string $username,
         string $password,
         string $host = 'localhost',
         string $port = '3306',
         string $charset = 'utf8'
    ) {
        $data = [
             'host'     => $host,
             'port'     => $port,
             'dbname'   => $database,
             'username' => $username,
             'password' => $password,
             'charset'  => $charset,
        ];

        $original = [
             'host'     => 'localhost',
             'port'     => '3306',
             'dbname'   => '',
             'username' => '',
             'password' => '',
             'charset'  => 'utf8',
        ];

        $this->data = Arr::normalize($data, $original);
    }

    /**
     * @inheritdoc
     */
    public function getDSN(): string
    {
        return Str::mustacheTranslate(static::DSN, $this->data);
    }
}
