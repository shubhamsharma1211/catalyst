<?php

namespace Beehive\GuzzleHttp;

use Beehive\GuzzleHttp\Event\HasEmitterInterface;
use Beehive\GuzzleHttp\Exception\RequestException;
use Beehive\GuzzleHttp\Message\RequestInterface;
use Beehive\GuzzleHttp\Message\ResponseInterface;
/**
 * Client interface for sending HTTP requests
 */
interface ClientInterface extends \Beehive\GuzzleHttp\Event\HasEmitterInterface
{
    const VERSION = '5.3.1';
    /**
     * Create and return a new {@see RequestInterface} object.
     *
     * Use an absolute path to override the base path of the client, or a
     * relative path to append to the base path of the client. The URL can
     * contain the query string as well. Use an array to provide a URL
     * template and additional variables to use in the URL template expansion.
     *
     * @param string           $method  HTTP method
     * @param string|array|Url $url     URL or URI template
     * @param array            $options Array of request options to apply.
     *
     * @return RequestInterface
     */
    public function createRequest($method, $url = null, array $options = []);
    /**
     * Send a GET request
     *
     * @param string|array|Url $url     URL or URI template
     * @param array            $options Array of request options to apply.
     *
     * @return ResponseInterface
     * @throws RequestException When an error is encountered
     */
    public function get($url = null, $options = []);
    /**
     * Send a HEAD request
     *
     * @param string|array|Url $url     URL or URI template
     * @param array            $options Array of request options to apply.
     *
     * @return ResponseInterface
     * @throws RequestException When an error is encountered
     */
    public function head($url = null, array $options = []);
    /**
     * Send a DELETE request
     *
     * @param string|array|Url $url     URL or URI template
     * @param array            $options Array of request options to apply.
     *
     * @return ResponseInterface
     * @throws RequestException When an error is encountered
     */
    public function delete($url = null, array $options = []);
    /**
     * Send a PUT request
     *
     * @param string|array|Url $url     URL or URI template
     * @param array            $options Array of request options to apply.
     *
     * @return ResponseInterface
     * @throws RequestException When an error is encountered
     */
    public function put($url = null, array $options = []);
    /**
     * Send a PATCH request
     *
     * @param string|array|Url $url     URL or URI template
     * @param array            $options Array of request options to apply.
     *
     * @return ResponseInterface
     * @throws RequestException When an error is encountered
     */
    public function patch($url = null, array $options = []);
    /**
     * Send a POST request
     *
     * @param string|array|Url $url     URL or URI template
     * @param array            $options Array of request options to apply.
     *
     * @return ResponseInterface
     * @throws RequestException When an error is encountered
     */
    public function post($url = null, array $options = []);
    /**
     * Send an OPTIONS request
     *
     * @param string|array|Url $url     URL or URI template
     * @param array            $options Array of request options to apply.
     *
     * @return ResponseInterface
     * @throws RequestException When an error is encountered
     */
    public function options($url = null, array $options = []);
    /**
     * Sends a single request
     *
     * @param RequestInterface $request Request to send
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     * @throws \LogicException When the handler does not populate a response
     * @throws RequestException When an error is encountered
     */
    public function send(\Beehive\GuzzleHttp\Message\RequestInterface $request);
    /**
     * Get default request options of the client.
     *
     * @param string|null $keyOrPath The Path to a particular default request
     *     option to retrieve or pass null to retrieve all default request
     *     options. The syntax uses "/" to denote a path through nested PHP
     *     arrays. For example, "headers/content-type".
     *
     * @return mixed
     */
    public function getDefaultOption($keyOrPath = null);
    /**
     * Set a default request option on the client so that any request created
     * by the client will use the provided default value unless overridden
     * explicitly when creating a request.
     *
     * @param string|null $keyOrPath The Path to a particular configuration
     *     value to set. The syntax uses a path notation that allows you to
     *     specify nested configuration values (e.g., 'headers/content-type').
     * @param mixed $value Default request option value to set
     */
    public function setDefaultOption($keyOrPath, $value);
    /**
     * Get the base URL of the client.
     *
     * @return string Returns the base URL if present
     */
    public function getBaseUrl();
}