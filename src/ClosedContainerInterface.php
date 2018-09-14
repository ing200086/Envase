<?php

namespace Ing200086\GraphCore;

use Ing200086\GraphCore\Exception\InvalidArgumentException;
use Ing200086\GraphCore\Exception\NotFoundException;
use Psr\Container\ContainerInterface;

interface ClosedContainerInterface extends ContainerInterface {
    /**
     * @param $id
     * @return mixed
     * @throws NotFoundException
     * @throws InvalidArgumentException
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
     * @param callable $closure
     * @return bool
     */
    public function hasThatMatches(callable $closure) : bool;

    /**
     * @param callable $closure
     * @return ClosedContainerInterface
     * @throws NotFoundException
     */
    public function getThatMatches(callable $closure) : ClosedContainerInterface;
}