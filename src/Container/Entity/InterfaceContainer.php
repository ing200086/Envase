<?php

namespace Ing200086\GraphCore\Container\Entity;

use Ing200086\GraphCore\Container\Generic\InterfaceClosedContainer;

interface InterfaceContainer extends InterfaceClosedContainer {
    public function add(InterfaceEntity &$entity);

    public function remove(string $id);

    public function getThatMatches(callable $closure) : InterfaceContainer;
}