<?php

namespace Beehive\GuzzleHttp\Message;

use Beehive\GuzzleHttp\Collection;
use Beehive\GuzzleHttp\Event\HasEmitterTrait;
use Beehive\GuzzleHttp\Subscriber\Prepare;
use Beehive\GuzzleHttp\Url;
/**
 * HTTP request class to send requests
 */
class Request extends \Beehive\GuzzleHttp\Message\AbstractMessage implements \Beehive\GuzzleHttp\Message\RequestInterface
{
    use HasEmitterTrait;
    /** @var Url HTTP Url */
    private $url;
    /** @var string HTTP method */
    private $method;
    /** @var Collection Transfer options */
    private $transferOptions;
    /**
     * @param string           $method  HTTP method
     * @param string|Url       $url     HTTP URL to connect to. The URI scheme,
     *   host header, and URI are parsed from the full URL. If query string
     *   parameters are present they will be parsed as well.
     * @param array|Collection $headers HTTP headers
     * @param mixed            $body    Body to send with the request
     * @param array            $options Array of options to use with the request
     *     - emitter: Event emitter to use with the request
     */
    public function __construct($method, $url, $headers = [], $body = null, array $options = [])
    {
        $this->setUrl($url);
        $this->method = \strtoupper($method);
        $this->handleOptions($options);
        $this->transferOptions = new \Beehive\GuzzleHttp\Collection($options);
        $this->addPrepareEvent();
        if ($body !== null) {
            $this->setBody($body);
        }
        if ($headers) {
            foreach ($headers as $key => $value) {
                $this->addHeader($key, $value);
            }
        }
    }
    public function __clone()
    {
        if ($this->emitter) {
            $this->emitter = clone $this->emitter;
        }
        $this->transferOptions = clone $this->transferOptions;
        $this->url = clone $this->url;
    }
    public function setUrl($url)
    {
        $this->url = $url instanceof \Beehive\GuzzleHttp\Url ? $url : \Beehive\GuzzleHttp\Url::fromString($url);
        $this->updateHostHeaderFromUrl();
    }
    public function getUrl()
    {
        return (string) $this->url;
    }
    public function setQuery($query)
    {
        $this->url->setQuery($query);
    }
    public function getQuery()
    {
        return $this->url->getQuery();
    }
    public function setMethod($method)
    {
        $this->method = \strtoupper($method);
    }
    public function getMethod()
    {
        return $this->method;
    }
    public function getScheme()
    {
        return $this->url->getScheme();
    }
    public function setScheme($scheme)
    {
        $this->url->setScheme($scheme);
    }
    public function getPort()
    {
        return $this->url->getPort();
    }
    public function setPort($port)
    {
        $this->url->setPort($port);
        $this->updateHostHeaderFromUrl();
    }
    public function getHost()
    {
        return $this->url->getHost();
    }
    public function setHost($host)
    {
        $this->url->setHost($host);
        $this->updateHostHeaderFromUrl();
    }
    public function getPath()
    {
        return '/' . \ltrim($this->url->getPath(), '/');
    }
    public function setPath($path)
    {
        $this->url->setPath($path);
    }
    public function getResource()
    {
        $resource = $this->getPath();
        if ($query = (string) $this->url->getQuery()) {
            $resource .= '?' . $query;
        }
        return $resource;
    }
    public function getConfig()
    {
        return $this->transferOptions;
    }
    protected function handleOptions(array &$options)
    {
        parent::handleOptions($options);
        // Use a custom emitter if one is specified, and remove it from
        // options that are exposed through getConfig()
        if (isset($options['emitter'])) {
            $this->emitter = $options['emitter'];
            unset($options['emitter']);
        }
    }
    /**
     * Adds a subscriber that ensures a request's body is prepared before
     * sending.
     */
    private function addPrepareEvent()
    {
        static $subscriber;
        if (!$subscriber) {
            $subscriber = new \Beehive\GuzzleHttp\Subscriber\Prepare();
        }
        $this->getEmitter()->attach($subscriber);
    }
    private function updateHostHeaderFromUrl()
    {
        $port = $this->url->getPort();
        $scheme = $this->url->getScheme();
        if ($host = $this->url->getHost()) {
            if ($port == 80 && $scheme == 'http' || $port == 443 && $scheme == 'https') {
                $this->setHeader('Host', $host);
            } else {
                $this->setHeader('Host', "{$host}:{$port}");
            }
        }
    }
}