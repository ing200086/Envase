<?php

namespace Ing200086\GraphCore\Vertices;

use Ing200086\GraphCore\Container\Generic\InterfaceClosedContainer;
use Ing200086\GraphCore\Container\Entity\EntityContainer;
use Ing200086\GraphCore\Vertex\UnregisteredInterface;


abstract class AbstractContainer implements InterfaceContainer {
    protected $_container;

    protected function __construct(EntityContainer $container = null)
    {
        $this->_container = $container ?? EntityContainer::Create();
    }

    public function add(UnregisteredInterface &$vertex)
    {
        $this->_container->add($vertex);
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
        return $this->hasThatMatches($closure);
    }

    public function toArray() : array
    {
        return $this->_container->toArray();
    }

    public function getThatMatches(callable $closure) : InterfaceClosedContainer
    {
        $result = $this->_container->getThatMatches($closure);

        return new static($result);
    }

}