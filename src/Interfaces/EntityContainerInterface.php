<?php

namespace Ing200086\GraphCore\Interfaces;

use Ing200086\GraphCore\Exception\NotFoundException;

interface EntityContainerInterface extends ClosedContainerInterface {
    public function add(EntityInterface &$entity);

    /**
     * @param string $id
     * @return mixed
     * @throws NotFoundException
     */
    public function remove(string $id);
}