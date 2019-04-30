<?php

namespace Components\Databases;

use Components\Containers\Container;
use Components\Databases\Drivers\Contracts\DriverInterface;
use Components\Exceptions\ClassNotFoundException;
use Helpers\Str;
use PDO;

use function sprintf;

class DB
{
    /**
     * PDO container
     *
     * @var PDO
     */
    private $pdo;

    /**
     * DB constructor.
     *
     * @param string $driver
     * @param string $database
     * @param string $username
     * @param string $password
     * @param string $host
     * @param string $port
     * @param string $charset
     *
     * @throws ClassNotFoundException
     * @throws \Components\Exceptions\ParameterMissingException
     * @throws \ReflectionException
     */
    public function __construct(
         string $driver,
         string $database,
         string $username,
         string $password,
         string $host = 'localhost',
         string $port = '3306',
         string $charset = 'utf8'
    ) {
        $dbDriver = $this->getDriver($driver, $database, $username, $password, $host, $port, $charset);

        $this->pdo = new PDO($dbDriver->getDSN(), $username, $password);
    }

    /**
     * @param string $driver
     * @param string $database
     * @param string $username
     * @param string $password
     * @param string $host
     * @param string $port
     * @param string $charset
     *
     * @return DriverInterface
     * @throws ClassNotFoundException
     * @throws \Components\Exceptions\ParameterMissingException
     * @throws \ReflectionException
     */
    private function getDriver(
         string $driver,
         string $database,
         string $username,
         string $password,
         string $host,
         string $port,
         string $charset = 'utf8'
    ): DriverInterface {
        $class = sprintf("Components\Databases\Drivers\%s", Str::toStudly($driver));

        $params = [
             'database' => $database,
             'username' => $username,
             'password' => $password,
             'host'     => $host,
             'port'     => $port,
             'charset'  => $charset,
        ];

        return Container::i()->make($class, $params, true);
    }
}
