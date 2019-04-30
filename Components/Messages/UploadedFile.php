<?php

namespace Components\Messages;

use Components\Messages\Contracts\UploadedFileInterface;

class UploadedFile implements UploadedFileInterface
{
    /**
     * @inheritdoc
     */
    public function getStream()
    {
        // TODO: Implement getStream() method.
    }

    /**
     * @inheritdoc
     */
    public function moveTo($targetPath)
    {
        // TODO: Implement moveTo() method.
    }

    /**
     * @inheritdoc
     */
    public function getSize()
    {
        // TODO: Implement getSize() method.
    }

    /**
     * @inheritdoc
     */
    public function getError()
    {
        // TODO: Implement getError() method.
    }

    /**
     * @inheritdoc
     */
    public function getClientFilename()
    {
        // TODO: Implement getClientFilename() method.
    }

    /**
     * @inheritdoc
     */
    public function getClientMediaType()
    {
        // TODO: Implement getClientMediaType() method.
    }
}
