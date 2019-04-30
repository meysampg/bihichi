<?php

namespace Components\Messages;

use Components\Messages\Contracts\StreamInterface;

class Stream implements StreamInterface
{
    /**
     * @inheritdoc
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    /**
     * @inheritdoc
     */
    public function close()
    {
        // TODO: Implement close() method.
    }

    /**
     * @inheritdoc
     */
    public function detach()
    {
        // TODO: Implement detach() method.
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
    public function tell()
    {
        // TODO: Implement tell() method.
    }

    /**
     * @inheritdoc
     */
    public function eof()
    {
        // TODO: Implement eof() method.
    }

    /**
     * @inheritdoc
     */
    public function isSeekable()
    {
        // TODO: Implement isSeekable() method.
    }

    /**
     * @inheritdoc
     */
    public function seek($offset, $whence = SEEK_SET)
    {
        // TODO: Implement seek() method.
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

    /**
     * @inheritdoc
     */
    public function isWritable()
    {
        // TODO: Implement isWritable() method.
    }

    /**
     * @inheritdoc
     */
    public function write($string)
    {
        // TODO: Implement write() method.
    }

    /**
     * @inheritdoc
     */
    public function isReadable()
    {
        // TODO: Implement isReadable() method.
    }

    /**
     * @inheritdoc
     */
    public function read($length)
    {
        // TODO: Implement read() method.
    }

    /**
     * @inheritdoc
     */
    public function getContents()
    {
        // TODO: Implement getContents() method.
    }

    /**
     * @inheritdoc
     */
    public function getMetadata($key = null)
    {
        // TODO: Implement getMetadata() method.
    }
}
