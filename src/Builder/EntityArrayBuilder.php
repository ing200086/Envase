<?php

namespace Ing200086\Envase\Builder;

use Ing200086\Envase\Interfaces\EntityInterface;

/**
 * Class EntityArrayBuilder
 *
 * @package Ing200086\Envase\Builder
 */
class EntityArrayBuilder {
    protected $_items = [];

    protected function __construct(array $items)
    {
        foreach ($items as $item)
        {
            $this->add($item);
        }
    }

    /**
     * @param EntityInterface $entity
     */
    protected function add(EntityInterface $entity)
    {
        $this->_items[$entity->getId()] = $entity;
    }

    /**
     * @param array $items
     * @return EntityArrayBuilder
     */
    public static function Build(array $items)
    {
        return new static($items);
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        return $this->_items;
    }
}