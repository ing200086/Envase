<?php

namespace Ing200086\Envase\Interfaces;

use Ing200086\Envase\Exception\NotFoundException;

interface EntityContainerInterface extends ClosedContainerInterface {
    public function add(EntityInterface &$entity);

    /**
     * @param string $id
     * @return mixed
     * @throws NotFoundException
     */
    public function remove(string $id);
}