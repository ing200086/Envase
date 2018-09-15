<?php

namespace Ing200086\Envase\Interfaces;

use Ing200086\Envase\Exception\NotFoundException;

/**
 * Interface EntityContainerInterface
 *
 * @package Ing200086\Envase\Interfaces
 */
interface EntityContainerInterface extends ArrayContainerInterface {
    /**
     * @param EntityInterface $entity
     * @return mixed
     */
    public function add(EntityInterface $entity);

    /**
     * @param string $id
     * @return mixed
     * @throws NotFoundException
     */
    public function remove(string $id);
}