<?php

namespace Beehive\GuzzleHttp\Post;

use Beehive\GuzzleHttp\Message\AppliesHeadersInterface;
use Beehive\GuzzleHttp\Stream\StreamInterface;
/**
 * Represents a POST body that is sent as either a multipart/form-data stream
 * or application/x-www-urlencoded stream.
 */
interface PostBodyInterface extends \Beehive\GuzzleHttp\Stream\StreamInterface, \Countable, \Beehive\GuzzleHttp\Message\AppliesHeadersInterface
{
    /**
     * Set a specific field
     *
     * @param string       $name  Name of the field to set
     * @param string|array $value Value to set
     */
    public function setField($name, $value);
    /**
     * Set the aggregation strategy that will be used to turn multi-valued
     * fields into a string.
     *
     * The aggregation function accepts a deeply nested array of query string
     * values and returns a flattened associative array of key value pairs.
     *
     * @param callable $aggregator
     */
    public function setAggregator(callable $aggregator);
    /**
     * Set to true to force a multipart upload even if there are no files.
     *
     * @param bool $force Set to true to force multipart uploads or false to
     *     remove this flag.
     */
    public function forceMultipartUpload($force);
    /**
     * Replace all existing form fields with an array of fields
     *
     * @param array $fields Associative array of fields to set
     */
    public function replaceFields(array $fields);
    /**
     * Get a specific field by name
     *
     * @param string $name Name of the POST field to retrieve
     *
     * @return string|null
     */
    public function getField($name);
    /**
     * Remove a field by name
     *
     * @param string $name Name of the field to remove
     */
    public function removeField($name);
    /**
     * Returns an associative array of names to values or a query string.
     *
     * @param bool $asString Set to true to retrieve the fields as a query
     *     string.
     *
     * @return array|string
     */
    public function getFields($asString = \false);
    /**
     * Returns true if a field is set
     *
     * @param string $name Name of the field to set
     *
     * @return bool
     */
    public function hasField($name);
    /**
     * Get all of the files
     *
     * @return array Returns an array of PostFileInterface objects
     */
    public function getFiles();
    /**
     * Get a POST file by name.
     *
     * @param string $name Name of the POST file to retrieve
     *
     * @return PostFileInterface|null
     */
    public function getFile($name);
    /**
     * Add a file to the POST
     *
     * @param PostFileInterface $file File to add
     */
    public function addFile(\Beehive\GuzzleHttp\Post\PostFileInterface $file);
    /**
     * Remove all files from the collection
     */
    public function clearFiles();
}