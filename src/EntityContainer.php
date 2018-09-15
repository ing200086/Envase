<?php

namespace Ing200086\Envase;

use Ing200086\Envase\Builder\EntityArrayBuilder;
use Ing200086\Envase\Interfaces\EntityContainerInterface;
use Ing200086\Envase\Interfaces\EntityInterface;

/**
 * Class EntityContainer
 *
 * @package Ing200086\Envase
 */
class EntityContainer extends SealedContainer implements EntityContainerInterface {
    /**
     * @param array $items
     * @return SealedContainer|EntityContainer
     */
    public static function FromArray(array $items)
    {
        return new static(EntityArrayBuilder::Build($items)->toArray());
    }

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
     * @throws Exception\NotFoundException
     */
    public function remove(string $id)
    {
        $this->get($id);
        unset($this->_items[$id]);
    }
}