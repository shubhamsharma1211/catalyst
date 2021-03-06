<?php

namespace Beehive\GuzzleHttp\Stream;

/**
 * Uses PHP's zlib.inflate filter to inflate deflate or gzipped content.
 *
 * This stream decorator skips the first 10 bytes of the given stream to remove
 * the gzip header, converts the provided stream to a PHP stream resource,
 * then appends the zlib.inflate filter. The stream is then converted back
 * to a Guzzle stream resource to be used as a Guzzle stream.
 *
 * @link http://tools.ietf.org/html/rfc1952
 * @link http://php.net/manual/en/filters.compression.php
 */
class InflateStream implements \Beehive\GuzzleHttp\Stream\StreamInterface
{
    use StreamDecoratorTrait;
    public function __construct(\Beehive\GuzzleHttp\Stream\StreamInterface $stream)
    {
        // Skip the first 10 bytes
        $stream = new \Beehive\GuzzleHttp\Stream\LimitStream($stream, -1, 10);
        $resource = \Beehive\GuzzleHttp\Stream\GuzzleStreamWrapper::getResource($stream);
        \stream_filter_append($resource, 'zlib.inflate', \STREAM_FILTER_READ);
        $this->stream = new \Beehive\GuzzleHttp\Stream\Stream($resource);
    }
}