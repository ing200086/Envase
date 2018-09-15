<?php

namespace Ing200086\Envase;

/**
 * Class EntityContainer
 *
 * @package Ing200086\Envase
 */
class EntityContainer extends EntityContainerAbstract {
    protected function __construct(array $items)
    {
        $this->_items = $items;
    }

    /**
     * @param array $items
     * @return EntityContainer
     */
    public static function FromArray(array $items)
    {
        $container = static::Create();

        foreach ( $items as $item )
        {
            $container->add($item);
        }

        return $container;
    }

    /**
     * @return EntityContainer
     */
    public static function Create()
    {
        return new static([]);
    }
}