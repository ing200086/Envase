<?php

namespace Ing200086\Envase\Interfaces;

use Ing200086\Envase\Exception\InvalidArgumentException;
use Ing200086\Envase\Exception\NotFoundException;
use Psr\Container\ContainerInterface;

interface ArrayContainerInterface extends ContainerInterface, \Countable, \Iterator {
    /**
     * @param $id
     * @return mixed
     * @throws NotFoundException | InvalidArgumentException
     */
    public function get($id);

    /**
     * @param $id
     * @return bool
     */
    public function has($id) : bool;

    /**
     * @return int
     */
    public function size() : int;

    /**
     * @return array
     */
    public function toArray() : array;

    /**
     * @return int
     */
    public function count() : int;
}