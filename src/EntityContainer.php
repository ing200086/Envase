<?php

namespace Ing200086\GraphCore;

use Ing200086\GraphCore\Builder\EntityArrayBuilder;
use Ing200086\GraphCore\Interfaces\EntityContainerInterface;
use Ing200086\GraphCore\Interfaces\EntityInterface;

/**
 * Class EntityContainer
 *
 * @package Ing200086\GraphCore
 */
class EntityContainer extends BaseContainer implements EntityContainerInterface {
    /**
     * @param array $items
     * @return BaseContainer|EntityContainer
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