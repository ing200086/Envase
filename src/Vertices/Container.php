<?php

namespace Ing200086\GraphCore\Vertices;

use Ing200086\GraphCore\Graph\GraphInterface;

class Container extends AbstractContainer {
    public static function Create()
    {
        return new static();
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

    public function register(GraphInterface &$graph)
    {
        return RegisteredContainer::FromArray($graph, $this->_container->toArray());
    }
}