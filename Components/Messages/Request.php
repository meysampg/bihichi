<?php

namespace Components\Messages;

use Components\Messages\Contracts\RequestInterface;
use Components\Messages\Contracts\UriInterface;

class Request extends Message implements RequestInterface
{
    /**
     * @inheritdoc
     */
    public function getBody()
    {
        // TODO: Implement getBody() method.
    }

    /**
     * @inheritdoc
     */
    public function getRequestTarget()
    {
        // TODO: Implement getRequestTarget() method.
    }

    /**
     * @inheritdoc
     */
    public function withRequestTarget($requestTarget)
    {
        // TODO: Implement withRequestTarget() method.
    }

    /**
     * @inheritdoc
     */
    public function getMethod()
    {
        // TODO: Implement getMethod() method.
    }

    /**
     * @inheritdoc
     */
    public function withMethod($method)
    {
        // TODO: Implement withMethod() method.
    }

    /**
     * @inheritdoc
     */
    public function getUri()
    {
        // TODO: Implement getUri() method.
    }

    /**
     * @inheritdoc
     */
    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        // TODO: Implement withUri() method.
    }
}
