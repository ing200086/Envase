<?php

namespace Ing200086\GraphCore\Container\Generic;

use Psr\Container\ContainerInterface;

interface InterfaceBaseContainer extends ContainerInterface {
    /**
     * @param $id
     * @return mixed
     * @throws NotFoundException
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
}