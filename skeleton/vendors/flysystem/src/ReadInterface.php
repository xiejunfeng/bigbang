<?php

namespace League\Flysystem;

interface ReadInterface
{
    /**
     * Check wether a file exists
     *
     * @param   string  $path
     * @return  bool
     */
    public function has($path);

    /**
     * Read a file
     *
     * @param   string  $path
     * @return  false|array
     */
    public function read($path);

    /**
     * Read a file as a stream
     *
     * @param   string  $path
     * @return  false|array
     */
    public function readStream($path);

    /**
     * List contents of a directory
     *
     * @param   string  $directory
     * @param   bool    $recursive
     * @return  false|array
     */
    public function listContents($directory = '', $recursive = false);

    /**
     * Get all the meta data of a file or directory
     *
     * @param   string  $path
     * @return  false|array
     */
    public function getMetadata($path);

    /**
     * Get all the meta data of a file or directory
     *
     * @param   string  $path
     * @return  false|array
     */
    public function getSize($path);

    /**
     * Get the mimetype of a file
     *
     * @param   string  $path
     * @return  false|array
     */
    public function getMimetype($path);

    /**
     * Get the timestamp of a file
     *
     * @param   string  $path
     * @return  false|array
     */
    public function getTimestamp($path);

    /**
     * Get the visibility of a file
     *
     * @param   string  $path
     * @return  false|array
     */
    public function getVisibility($path);
}
