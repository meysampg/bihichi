<?php

namespace Components\Application;

use Components\Messages\HeadRequest;

/**
 * Class Application is the wrapper of the application
 *
 * @package Components\Application
 */
class Application
{
    private $request;

    public function __construct(HeadRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Bootstrap the application
     */
    public function start()
    {
        echo "Hello, World";
    }
}
