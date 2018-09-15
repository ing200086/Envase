<?php

namespace Ing200086\Envase\Interfaces;

/**
 * Interface KeyValueContainerInterface
 *
 * @package Ing200086\Envase\Interfaces
 */
interface KeyValueContainerInterface extends ArrayContainerInterface {
    /**
     * @param string $key
     * @param        $item
     * @return mixed
     */
    public function add(string $key, $item);

    /**
     * @param string $id
     * @return mixed
     */
    public function remove(string $id);
}