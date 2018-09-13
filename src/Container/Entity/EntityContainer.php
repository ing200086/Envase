<?php

namespace Ing200086\GraphCore\Container\Entity;

use Ing200086\GraphCore\Container\Generic\InterfaceOpenContainer;
use Ing200086\GraphCore\Container\Generic\OpenContainer;

class EntityContainer implements InterfaceContainer {
    protected $_container;

    protected function __construct(InterfaceOpenContainer $container = null)
    {
        $this->_container = $container ?? OpenContainer::Create();
    }

    public static function Create()
    {
        return new static(null);
    }

    public static function FromArray(array $items)
    {
        $container = static::Create();

        foreach ( $items as $item )
        {
            $container->add($item);
        }

        return $container;
    }

    public function add(InterfaceEntity &$entity)
    {
        $id = $entity->getId();
        $this->_container->add($id, $entity);
    }

    public function remove(string $id)
    {
        $this->remove($id);
    }

    public function get($id)
    {
        return $this->_container->get($id);
    }

    public function has($id) : bool
    {
        return $this->_container->has($id);
    }

    public function size() : int
    {
        return $this->_container->size();
    }

    public function hasThatMatches(callable $closure) : bool
    {
        return $this->_container->hasThatMatches($closure);
    }

    public function getThatMatches(callable $closure) : InterfaceContainer
    {
        $result = $this->_container->getThatMatches($closure);

        return static::FromArray($result->toArray());
    }

    public function toArray() : array
    {
        return $this->_container->toArray();
    }
}