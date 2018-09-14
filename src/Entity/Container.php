<?php

namespace Ing200086\GraphCore\Entity;

use Ing200086\GraphCore\BaseContainer;

class Container extends BaseContainer implements ContainerInterface {
    public static function FromArray(array $items)
    {
        $container = static::Create();

        foreach ( $items as $item )
        {
            $container->add($item);
        }

        return $container;
    }

    public static function Create()
    {
        return new static();
    }

    public function add(EntityInterface &$entity)
    {
        $this->_items[$entity->getId()] = $entity;
    }

    public function remove(string $id)
    {
        try
        {
            $this->validateHasId($id);
            unset($this->_items[$id]);
        } catch ( \Exception $e )
        {
            throw $e;
        }
    }

    public function toArray() : array
    {
        return $this->_items;
    }

    protected function _add($key, $item)
    {
        $key = strval($key);
        $this->_items[$key] = &$item;
    }
}