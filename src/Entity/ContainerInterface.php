<?php

namespace Ing200086\GraphCore\Entity;

use Ing200086\GraphCore\Exception\NotFoundException;
use Ing200086\GraphCore\ClosedContainerInterface;

interface ContainerInterface extends ClosedContainerInterface {
    public function add(EntityInterface &$entity);

    /**
     * @param string $id
     * @return mixed
     * @throws NotFoundException
     */
    public function remove(string $id);
}