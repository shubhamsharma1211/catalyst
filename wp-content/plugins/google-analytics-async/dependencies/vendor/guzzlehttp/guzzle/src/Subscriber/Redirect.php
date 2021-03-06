<?php

namespace Beehive\GuzzleHttp\Subscriber;

use Beehive\GuzzleHttp\Event\CompleteEvent;
use Beehive\GuzzleHttp\Event\RequestEvents;
use Beehive\GuzzleHttp\Event\SubscriberInterface;
use Beehive\GuzzleHttp\Exception\BadResponseException;
use Beehive\GuzzleHttp\Exception\CouldNotRewindStreamException;
use Beehive\GuzzleHttp\Exception\TooManyRedirectsException;
use Beehive\GuzzleHttp\Message\RequestInterface;
use Beehive\GuzzleHttp\Message\ResponseInterface;
use Beehive\GuzzleHttp\Url;
/**
 * Subscriber used to implement HTTP redirects.
 *
 * **Request options**
 *
 * - redirect: Associative array containing the 'max', 'strict', and 'referer'
 *   keys.
 *
 *   - max: Maximum number of redirects allowed per-request
 *   - strict: You can use strict redirects by setting this value to ``true``.
 *     Strict redirects adhere to strict RFC compliant redirection (e.g.,
 *     redirect POST with POST) vs doing what most clients do (e.g., redirect
 *     POST request with a GET request).
 *   - referer: Set to true to automatically add the "Referer" header when a
 *     redirect request is sent.
 *   - protocols: Array of allowed protocols. Defaults to 'http' and 'https'.
 *     When a redirect attempts to utilize a protocol that is not white listed,
 *     an exception is thrown.
 */
class Redirect implements \Beehive\GuzzleHttp\Event\SubscriberInterface
{
    public function getEvents()
    {
        return ['complete' => ['onComplete', \Beehive\GuzzleHttp\Event\RequestEvents::REDIRECT_RESPONSE]];
    }
    /**
     * Rewind the entity body of the request if needed
     *
     * @param RequestInterface $redirectRequest
     * @throws CouldNotRewindStreamException
     */
    public static function rewindEntityBody(\Beehive\GuzzleHttp\Message\RequestInterface $redirectRequest)
    {
        // Rewind the entity body of the request if needed
        if ($body = $redirectRequest->getBody()) {
            // Only rewind the body if some of it has been read already, and
            // throw an exception if the rewind fails
            if ($body->tell() && !$body->seek(0)) {
                throw new \Beehive\GuzzleHttp\Exception\CouldNotRewindStreamException('Unable to rewind the non-seekable request body after redirecting', $redirectRequest);
            }
        }
    }
    /**
     * Called when a request receives a redirect response
     *
     * @param CompleteEvent $event Event emitted
     * @throws TooManyRedirectsException
     */
    public function onComplete(\Beehive\GuzzleHttp\Event\CompleteEvent $event)
    {
        $response = $event->getResponse();
        if (\substr($response->getStatusCode(), 0, 1) != '3' || !$response->hasHeader('Location')) {
            return;
        }
        $request = $event->getRequest();
        $config = $request->getConfig();
        // Increment the redirect and initialize the redirect state.
        if ($redirectCount = $config['redirect_count']) {
            $config['redirect_count'] = ++$redirectCount;
        } else {
            $config['redirect_scheme'] = $request->getScheme();
            $config['redirect_count'] = $redirectCount = 1;
        }
        $max = $config->getPath('redirect/max') ?: 5;
        if ($redirectCount > $max) {
            throw new \Beehive\GuzzleHttp\Exception\TooManyRedirectsException("Will not follow more than {$redirectCount} redirects", $request);
        }
        $this->modifyRedirectRequest($request, $response);
        $event->retry();
    }
    private function modifyRedirectRequest(\Beehive\GuzzleHttp\Message\RequestInterface $request, \Beehive\GuzzleHttp\Message\ResponseInterface $response)
    {
        $config = $request->getConfig();
        $protocols = $config->getPath('redirect/protocols') ?: ['http', 'https'];
        // Use a GET request if this is an entity enclosing request and we are
        // not forcing RFC compliance, but rather emulating what all browsers
        // would do.
        $statusCode = $response->getStatusCode();
        if ($statusCode == 303 || $statusCode <= 302 && $request->getBody() && !$config->getPath('redirect/strict')) {
            $request->setMethod('GET');
            $request->setBody(null);
        }
        $previousUrl = $request->getUrl();
        $this->setRedirectUrl($request, $response, $protocols);
        $this->rewindEntityBody($request);
        // Add the Referer header if it is told to do so and only
        // add the header if we are not redirecting from https to http.
        if ($config->getPath('redirect/referer') && ($request->getScheme() == 'https' || $request->getScheme() == $config['redirect_scheme'])) {
            $url = \Beehive\GuzzleHttp\Url::fromString($previousUrl);
            $url->setUsername(null);
            $url->setPassword(null);
            $request->setHeader('Referer', (string) $url);
        } else {
            $request->removeHeader('Referer');
        }
    }
    /**
     * Set the appropriate URL on the request based on the location header
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array             $protocols
     */
    private function setRedirectUrl(\Beehive\GuzzleHttp\Message\RequestInterface $request, \Beehive\GuzzleHttp\Message\ResponseInterface $response, array $protocols)
    {
        $location = $response->getHeader('Location');
        $location = \Beehive\GuzzleHttp\Url::fromString($location);
        // Combine location with the original URL if it is not absolute.
        if (!$location->isAbsolute()) {
            $originalUrl = \Beehive\GuzzleHttp\Url::fromString($request->getUrl());
            // Remove query string parameters and just take what is present on
            // the redirect Location header
            $originalUrl->getQuery()->clear();
            $location = $originalUrl->combine($location);
        }
        // Ensure that the redirect URL is allowed based on the protocols.
        if (!\in_array($location->getScheme(), $protocols)) {
            throw new \Beehive\GuzzleHttp\Exception\BadResponseException(\sprintf('Redirect URL, %s, does not use one of the allowed redirect protocols: %s', $location, \implode(', ', $protocols)), $request, $response);
        }
        $request->setUrl($location);
    }
}