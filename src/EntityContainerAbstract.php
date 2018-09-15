<?php

namespace Ing200086\Envase;

use Ing200086\Envase\Exception\NotFoundException;
use Ing200086\Envase\Interfaces\EntityContainerInterface;
use Ing200086\Envase\Interfaces\EntityInterface;

/**
 * Class EntityContainer
 *
 * @package Ing200086\Envase
 */
abstract class EntityContainerAbstract extends SealedContainerAbstract implements EntityContainerInterface {
    /**
     * @param EntityInterface $entity
     */
    public function add(EntityInterface &$entity)
    {
        $this->_items[$entity->getId()] = $entity;
    }

    /**
     * @param string $id
     * @return mixed|void
     * @throws NotFoundException
     */
    public function remove(string $id)
    {
        $this->get($id);
        unset($this->_items[$id]);
    }
}